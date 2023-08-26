<?php

namespace Modules\Product\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Address\Services\AddressService;
use Modules\Color\Entities\Color;
use Modules\Color\Services\ColorService;
use Modules\Location\Services\CountryService;
use Modules\Polymorphism\Services\ImageService;
use Modules\Polymorphism\Services\VideoService;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductGroup;
use Modules\Product\Entities\SuggestProduct;
use Modules\Product\Entities\VisitProduct;
use Modules\Product\Http\Repositories\PriceProductRepository;
use Modules\Product\Http\Repositories\ProductGroupRepository;
use Modules\Product\Http\Repositories\ProductRepository;
use Modules\Product\Http\Repositories\SuggestProductRepository;
use Modules\Product\Http\Requests\product\ValidateProductRequest;
use Modules\Product\Http\Requests\productGroup\ValidateProductGroupRequest;
use Modules\ShopBasket\Entities\PaymentMethod;
use Modules\ShopBasket\Http\Repositories\FactorRepository;
use Modules\ShopBasket\Services\PaymentMethodService;
use Modules\Size\Services\SizeService;
use Modules\Unit\Services\UnitService;
use Yajra\DataTables\Facades\DataTables;


class ProductService
{
    public function __construct(public ProductRepository $productRepository)
    {
    }

    public function index($request)
    {
        $filter = [];
        if ($request->title) {
            $filter[] = (object)[
                "col" => "title",
                "value" => $request->title,
                "like" => true,
            ];
        }
        $all = $this->productRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {

        $all = $this->productRepository->getByInput();


        return Datatables::of($all)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_product_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_product_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->addColumn('comments', function ($row) {

                $btn = '<a title="نظرات" href="' . route('dashboard_product_comments', $row->id) . '" class="round"><i class="fa fa-bar-chart info"></i></a>';

                return $btn;
            })
            ->addColumn('property', function ($row) {

                $property = '<a href="' . route('dashboard_product_property_create', $row->id) . '" class="round" ><i class="fa fa-edit warning"></i></a>';

                return $property;
            })
            ->addColumn('status', function ($row) {
                return $row->product_status;

            })
            ->addColumn('image', function ($row) {
                $img = '';
                if (count($row->image) != 0) {
                    $img = '<img src="/' . $row->banner . '" class="danger w-150"/>';
                }

                return $img;
            })
            ->addColumn('titles', function ($row) {
                $titles = ' <div>'.$row->title .$row->sub_title .$row->brand.'</div>';
                $titles = '<div class="d-flex flex-column">
  <div class="p-2">'.$row->title .'</div>
  <div class="p-2">'.$row->sub_title .'</div>
  <div class="p-2">'.$row->brand .'</div>
</div>';



                return $titles;
            })
            ->addColumn('detail', function ($row) {
                $status = '';
                if ($row->status == 1){
                    $status = 'checked';
                }
                $detail = ' <form class="form" method="get" action="' . route('dashboard_product_update_price') . '"
                                  enctype="multipart/form-data">
                                  <input name="id" value="' . $row->id . '" hidden>
<div class="col-12">
                                            <label style="margin-top: 10px">قیمت سازمانی</label>
                                            <fieldset class="form-group">
                                                <input type="number" id="last-name-column" class="form-control"
                                                       placeholder="قیمت" name="price" value="' . $row->price . '">

                                            </fieldset>
                                        </div>
                                         <div class="col-12">
                                            <label style="margin-top: 10px">قیمت با تخفیف </label>
                                            <fieldset class="form-group">
                                                <input type="number" id="last-name-column" class="form-control"
                                                       placeholder="قیمت با تخفیف " name="off_price"
                                                       value="' . $row->off_price . '">

                                            </fieldset>
                                        </div>
                                           <div class="col-12">
                                            <label style="margin-top: 10px">موجودی </label>
                                            <fieldset class="form-group">
                                                <input type="number" id="last-name-column" class="form-control"
                                                       placeholder="موجودی " name="available"
                                                          value="' . $row->available . '">

                                            </fieldset>
                                        </div>
                                         <div class="col-12">
  <ul class="list-unstyled mb-0">
              <li class="d-inline-block mr-2">
                <fieldset>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="status" id="customCheck' . $row->id . '"  '.$status.' value="1">
                    <label class="custom-control-label" for="customCheck' . $row->id . '">موجود</label>
                  </div>
                </fieldset>
              </li>

            </ul>
            </div>
                                         <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">ذخیره</button>
                                        </div>
                                        </form>
                                        ';
                return $detail;
            })
            ->rawColumns(['action', 'image', 'property', 'status' ,'comments','detail','titles'])
            ->make(true);
    }

    public function find($id)
    {
        return $this->productRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->productRepository->find($id);

        if ($item) {
            DB::beginTransaction();
            try {
                $item->prices()->delete();
                $item->image()->delete();
                $itemDeleted = $this->productRepository->delete($item);
                DB::commit();

                return $itemDeleted;
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.delete_failed"));
            }
        } else {
            throw new \Exception(trans("custom.defaults.not_found"));
        }
    }

    public function update(ValidateProductRequest $request, $id)
    {

        $inputs = $request->validated();
        $inputs["off_price"] = $inputs["off_price"] ?? 0;
        $inputs["off"] = $inputs["off"] ?? 0;
        $inputs["available"] = $inputs["available"] ?? 0;
        $inputs["weight"] = $inputs["weight"] ?? 0;
        $inputs["weight_with_packaging"] = $inputs["weight_with_packaging"] ?? 0;
        $inputs["unit_weight"] = $inputs["unit_weight"] ?? 0;
        $inputs["status"] = $inputs["status"] ?? 0;
        $inputs["full_title"] = $inputs["full_title"] ?? $inputs["title"];
        $totalUnitItem = $this->productRepository->find($id);


        if ($totalUnitItem) {
            DB::beginTransaction();
            try {

                $totalUnitItemUpdated = $this->productRepository->update($totalUnitItem, $inputs);
                $image = $inputs["file"] ?? null;
                $IsCover = $inputs["isCover"] ?? null;
                $prices = $inputs["pricearray"] ?? null;
                $numberss = $inputs["numberarray"] ?? null;
                $suggests = $inputs["suggest"] ?? null;

                $ids = $inputs["ids"] ?? null;
                DB::commit();
                $image = $inputs["file"] ?? null;
                if ($image != null) {
                    foreach ($image as $key => $item) {
                        $cover = $IsCover[$key] ?? false;
                        if ($key == 0) {
                            $cover = true;
                        }

                        $this->uploadImage($totalUnitItem, $item, $cover);
                    }
                }

                if (isset($inputs['video'])) {
                    $video = $inputs['video'] ?? null;
                    VideoService::saveVideo(video: $video, model: $totalUnitItem);
                }

                if ($prices != null and count($prices) != 0) {
                    $priceProductRepository = new PriceProductRepository();
                    $procuctPrices = $priceProductRepository->by(null, 'product_id', $id);

                    if ($ids) {

                        $priceProductRepository->byArray($procuctPrices, 'id', $ids, 'Not')->delete();
                    } else {

                        $procuctPrices->delete();

                    }

                    foreach ($prices as $key => $item) {
                        $itemPrice = [];
                        $itemPrice["price"] = (int)$item;
                        $itemPrice["number"] = (int)$numberss[$key] ?? 0;
                        $itemPrice["product_id"] = $totalUnitItem->id;
                        $priceProductService = resolve(PriceProductService::class);
                        if ($ids and $key < count($ids)) {
                            $priceProductService->update($itemPrice, $ids[$key]);
                        } else {

                            $totalUnitItem->prices()->save($priceProductService->store($itemPrice));
                            /* dump($priceProductService->store($itemPrice)) ;*/
                        }

                    }
                }
                if ($suggests != null and count($suggests) != 0) {
                    $suggestProductRepository = new SuggestProductRepository();
                    $suggestProducts = $suggestProductRepository->by(null, 'product_id', $id)->delete();

                    foreach ($suggests as $key => $item) {
                        $itemSuggest = [];
                        $itemSuggest["suggest_id"] = $item;
                        $itemSuggest["product_id"] = $id;
                        resolve(SuggestProductRepository::class)->create($itemSuggest);

                    }
                }


            } catch (\Exception $exception) {
                DB::rollBack();

                throw new \Exception(trans("custom.defaults.update_failed"));
            }

        } else {
            throw new \Exception(trans("custom.defaults.not_found"));
        }

        return $totalUnitItemUpdated;
    }
    public function updatePrice($request)
    {
        $inputs =[];
        $inputs ['price'] =  $request->price ;
        $inputs ['off_price'] = $request->off_price ;
        $inputs ['available'] =  $request->available ;
        $inputs ['status'] =  $request->status ?? 0 ;

        $totalUnitItem = $this->productRepository->find($request->id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->productRepository->update($totalUnitItem, $inputs);
                DB::commit();

            } catch (\Exception $exception) {
                DB::rollBack();

                throw new \Exception(trans("custom.defaults.update_failed"));
            }

        } else {
            throw new \Exception(trans("custom.defaults.not_found"));
        }

        return $totalUnitItemUpdated;
    }

    public function store(ValidateProductRequest $request)
    {

        $inputs = $request->validated();
        $inputs["off_price"] = $inputs["off_price"] ?? 0;
        $inputs["off"] = $inputs["off"] ?? 0;
        $inputs["available"] = $inputs["available"] ?? 0;
        $inputs["weight"] = $inputs["weight"] ?? 0;
        $inputs["weight_with_packaging"] = $inputs["weight_with_packaging"] ?? 0;
        $inputs["unit_weight"] = $inputs["unit_weight"] ?? 0;
        $inputs["status"] = $inputs["status"] ?? 0;
        $inputs["full_title"] = $inputs["full_title"] ?? $inputs["title"];


        DB::beginTransaction();
        try {
            $totalUnitsItem = $this->productRepository->create($inputs);
            $image = $inputs["file"] ?? null;
            $IsCover = $inputs["isCover"] ?? null;
            $prices = $inputs["pricearray"] ?? null;
            $numberss = $inputs["numberarray"] ?? null;
            $suggests = $inputs["suggest"] ?? null;


            if ($image != null) {
                foreach ($image as $key => $item) {
                    $cover = $IsCover[$key] ?? false;
                    if ($key == 0) {
                        $cover = true;
                    }

                    $this->uploadImage($totalUnitsItem, $item, $cover);
                }
            }

            if (isset($inputs['video'])) {
                $video = $inputs['video'] ?? null;
                VideoService::saveVideo(video: $video, model: $totalUnitsItem);
            }
            if ($prices != null and count($prices) != 0) {
                foreach ($prices as $key => $item) {
                    $itemPrice = [];
                    $itemPrice["price"] = $item;
                    $itemPrice["number"] = $numberss[$key] ?? 0;
                    $itemPrice["product_id"] = $totalUnitsItem->id;

                    $totalUnitsItem->prices()->save(resolve(PriceProductService::class)->store($itemPrice));

                }
            }
            if ($suggests != null and count($suggests) != 0) {
                foreach ($suggests as $key => $item) {
                    $itemSuggest = [];
                    $itemSuggest["suggest_id"] = $item;
                    $itemSuggest["product_id"] = $totalUnitsItem->id;
                    resolve(SuggestProductRepository::class)->create($itemSuggest);


                }
            }


            DB::commit();
            return $totalUnitsItem;

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
            throw new \Exception(trans("custom.defaults.store_failed"));
        }


    }


    public function all()
    {
        return $this->productRepository->getByInput();
    }

    public function uploadImage($guild, $file, $IsCover = false)
    {
        $destinationPath = "public/product/" . $guild->id;
        ImageService::saveImage(image: $file, model: $guild, is_cover: $IsCover, is_public: true, destinationPath: $destinationPath);
    }

    public function shopIndexPage($request, $slug): object
    {
        $groupService = resolve(ProductGroupService::class);
        $groups = $groupService->all();
        $group = resolve(ProductGroupService::class)->findBy("slug", $slug);
        $products = $this->productRepository->all();

        $filter = [];
        if ($group) {
            $filter[] = (object)[
                "col" => "product_group_id",
                "value" => $group->id,
                "like" => false,
            ];
            $products = $this->productRepository->getByInput($filter, 6, $request->pageNumber);
        }


        /*$sizeService = resolve(SizeSe::class);
        $sizes = $groupService->all();*/

        return (object)array("groups" => $groups, "product" => $products, 'group' => $group);
    }

    public function search($request): object
    {
        $groups = resolve(ProductGroupService::class)->all();


        $query = $this->productRepository->createQuery();
        if ($request->search) {
            $query = $this->productRepository->byLike($query, 'title', $request->search);
        }
        if ($request->groupIds) {
            $query = $this->productRepository->byArray($query, 'product_group_id', $request->groupIds);
        }
        $products = $query->get();


        /*$sizeService = resolve(SizeSe::class);
        $sizes = $groupService->all();*/

        return (object)array("groups" => $groups, "product" => $products);
    }

    public function productDetail($slug)
    {
        $product = $this->productRepository->findBy("slug", $slug);
        $inputs["num_visit"] = $product->num_visit + 1;
        $totalUnitItemUpdated = $this->productRepository->update($product, $inputs);
        VisitProduct::query()->create(['user_id' => Auth::id()??0 , 'product_id' => $product->id]);
        return $product;
    }

    public function checkout()
    {
        $countries = resolve(CountryService::class)->all();
        $factorRepository = resolve(factorRepository::class);
        $inputs = array('user_id' => Auth::id(), 'factor_status' => 0);

        $factor = $factorRepository->findWithInputs($inputs);

        $myAddress = resolve(AddressService::class)->myAddress();
        $paymentMethod = resolve(PaymentMethodService::class)->all();

        return (object)array("countries" => $countries, "factor" => $factor, "myAddress" => $myAddress ,"paymentMethod" =>$paymentMethod);
    }

    public function productEditPage($id): object
    {
        $data = $this->productRepository->find($id);
        $group = resolve(ProductGroupService::class)->all();
        $unit = resolve(UnitService::class)->all();
        $suggests = resolve(SuggestService::class)->all();
        $suggestProductRepository = new SuggestProductRepository();

        $suggestProducts = $suggestProductRepository->by(null, 'product_id', $id);
        $suggestItem = [];
        foreach ($suggests as $suggest) {
            $sugPro = SuggestProduct::query()->where('product_id', $id)->where('suggest_id', $suggest->id)->first();
            $checked = false;
            if ($sugPro) {
                $checked = true;
            }

            $suggestpro = (object)[
                "id" => $suggest->id,
                "title" => $suggest->title,
                "checked" => $checked,
            ];
            array_push($suggestItem, $suggestpro);
        }
        return (object)array("data" => $data, "group" => $group, "unit" => $unit, "suggests" => $suggestItem);
    }
    public function report(): object
    {
       /* $data = $this->productRepository->find();*/
        $lastMonth = VisitProduct::query()->whereYear('created_at', '=', Carbon::now()->year)
        ->whereMonth('created_at', '=', Carbon::now()->month)->get();
        $lastWeek = VisitProduct::query()->whereDate('created_at', '>', Carbon::now()->subDays(7))->get();
        $yesterday = VisitProduct::query()->whereDate('created_at', '>', Carbon::now()->subDays(1))->get();

        return (object)array("lastMonth" => $lastMonth,'lastWeek' =>$lastWeek , 'yesterday'=>$yesterday);
    }
}
