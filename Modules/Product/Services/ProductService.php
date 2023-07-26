<?php

namespace Modules\Product\Services;

use Illuminate\Support\Facades\DB;
use Modules\Color\Entities\Color;
use Modules\Color\Services\ColorService;
use Modules\Polymorphism\Services\ImageService;
use Modules\Polymorphism\Services\VideoService;
use Modules\Product\Entities\ProductGroup;
use Modules\Product\Http\Repositories\PriceProductRepository;
use Modules\Product\Http\Repositories\ProductGroupRepository;
use Modules\Product\Http\Repositories\ProductRepository;
use Modules\Product\Http\Requests\product\ValidateProductRequest;
use Modules\Product\Http\Requests\productGroup\ValidateProductGroupRequest;
use Modules\Size\Services\SizeService;
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


        return  Datatables::of($all)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_product_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_product_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->addColumn('property', function ($row) {

                $property = '<a href="' . route('dashboard_product_property_create', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $property;
            })
            ->addColumn('image', function ($row) {
                $img = '';
                if (count($row->image) !=0) {
                    $img = '<img src="/' . $row->banner. '" class="danger w-25"/>';
                }

                return $img;
            })
            ->rawColumns(['action', 'image','property'])
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
        $inputs["off_price"] = $inputs["off_price"] ?? 0 ;
        $inputs["off"] = $inputs["off"] ?? 0 ;
        $inputs["available"] = $inputs["available"] ?? 0 ;
        $inputs["weight"] = $inputs["weight"] ?? 0 ;
        $inputs["weight_with_packaging"] = $inputs["weight_with_packaging"] ?? 0 ;
        $inputs["unit_weight"] = $inputs["unit_weight"] ?? 0 ;
        $inputs["status"] = $inputs["status"] ?? 0 ;
        $inputs["full_title"] = $inputs["full_title"] ?? $inputs["title"] ;
        $totalUnitItem = $this->productRepository->find($id);


        if ($totalUnitItem) {
            DB::beginTransaction();
            try {

                $totalUnitItemUpdated = $this->productRepository->update($totalUnitItem, $inputs);
                $image = $inputs["file"] ?? null;
                $IsCover = $inputs["isCover"] ?? null;
                $prices = $inputs["pricearray"] ?? null;
                $numberss = $inputs["numberarray"] ?? null;
                $ids = $inputs["ids"] ?? null;
                DB::commit();
                $image = $inputs["file"] ?? null;
                if ($image != null) {
                    foreach ($image as $key =>$item){
                        $cover =$IsCover[$key] ?? false;
                        if ($key == 0){
                            $cover =true;
                        }

                        $this->uploadImage($totalUnitItem, $item ,$cover);
                    }
                }

                if(isset($inputs['video'])){
                    $video = $inputs['video'] ?? null;
                    VideoService::saveVideo(video:$video,model:$totalUnitItem);
                }

                if ($prices != null and count($prices) != 0) {
                    $priceProductRepository = new PriceProductRepository();
                    $procuctPrices = $priceProductRepository->by(null,'product_id',$id);

                    if ($ids){

                        $priceProductRepository->byArray($procuctPrices,'id',$ids,'Not')->delete();
                    }else{

                        $procuctPrices->delete();

                    }

                    foreach ($prices as $key => $item){
                        $itemPrice =[];
                        $itemPrice["price"] =(int)$item;
                        $itemPrice["number"] =(int)$numberss[$key] ?? 0;
                        $itemPrice["product_id"] =$totalUnitItem->id;
                        $priceProductService = resolve(PriceProductService::class);
                        if ($ids and $key < count($ids)){
                            $priceProductService->update($itemPrice,$ids[$key]) ;
                        }else{

                           $totalUnitItem->prices()->save($priceProductService->store($itemPrice));
                           /* dump($priceProductService->store($itemPrice)) ;*/
                        }

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

    public function store(ValidateProductRequest $request)
    {

        $inputs = $request->validated();
        $inputs["off_price"] = $inputs["off_price"] ?? 0 ;
        $inputs["off"] = $inputs["off"] ?? 0 ;
        $inputs["available"] = $inputs["available"] ?? 0 ;
        $inputs["weight"] = $inputs["weight"] ?? 0 ;
        $inputs["weight_with_packaging"] = $inputs["weight_with_packaging"] ?? 0 ;
        $inputs["unit_weight"] = $inputs["unit_weight"] ?? 0 ;
        $inputs["status"] = $inputs["status"] ?? 0 ;
        $inputs["full_title"] = $inputs["full_title"] ?? $inputs["title"] ;



        DB::beginTransaction();
        try {
            $totalUnitsItem = $this->productRepository->create($inputs);
            $image = $inputs["file"] ?? null;
            $IsCover = $inputs["isCover"] ?? null;
            $prices = $inputs["pricearray"] ?? null;
            $numberss = $inputs["numberarray"] ?? null;



            if ($image != null) {
                foreach ($image as $key =>$item){
                    $cover =$IsCover[$key] ?? false;
                    if ($key == 0){
                        $cover =true;
                    }

                    $this->uploadImage($totalUnitsItem, $item ,$cover);
                }
            }

            if(isset($inputs['video'])){
                $video = $inputs['video'] ?? null;
                VideoService::saveVideo(video:$video,model:$totalUnitsItem);
            }
            if ($prices != null and count($prices) != 0) {
                foreach ($prices as $key => $item){
                    $itemPrice =[];
                    $itemPrice["price"] =$item;
                    $itemPrice["number"] =$numberss[$key] ?? 0;
                    $itemPrice["product_id"] =$totalUnitsItem->id;

                  $totalUnitsItem->prices()->save(resolve(PriceProductService::class)->store($itemPrice));

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
    public function uploadImage($guild, $file , $IsCover = false)
    {
        $destinationPath = "public/product/" . $guild->id;
        ImageService::saveImage(image: $file, model: $guild, is_cover: $IsCover, is_public: true, destinationPath: $destinationPath);
    }

    public function shopIndexPage($request,$slug): object
    {
        $groupService = resolve(ProductGroupService::class);
        $groups = $groupService->all();
        $group = resolve(ProductGroupService::class)->findBy("slug",$slug);
        $products = $this->productRepository->all();

        $filter = [];
        if ($group){
            $filter[] = (object)[
                "col" => "product_group_id",
                "value" => $group->id,
                "like" => true,
            ];
            $products = $this->productRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        }


        /*$sizeService = resolve(SizeSe::class);
        $sizes = $groupService->all();*/

        return (object)array("groups"=>$groups,"product"=>$products);
    }

    public function productDetail($slug)
    {
        return $this->productRepository->findBy("slug",$slug);
    }
}
