<?php

namespace Modules\Product\Services;

use Illuminate\Support\Facades\DB;
use Modules\Color\Entities\Color;
use Modules\Color\Services\ColorService;
use Modules\Polymorphism\Services\ImageService;
use Modules\Product\Entities\ProductGroup;
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
                    $img = '<img src="/' . $row->image[0]->url. '" class="danger w-25"/>';
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

    public function update(ValidateProductRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->productRepository->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->productRepository->update($totalUnitItem, $inputs);
                DB::commit();
                $image = $inputs["file"] ?? null;
                if ($image !== null) {
                    foreach ($image as $item){
                    $this->uploadImage($totalUnitItemUpdated, $item);
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
            $color = $inputs["color_id"] ?? null;
            $size = $inputs["size_id"] ?? null;


            if ($image != null) {
                foreach ($image as $item){
                    $this->uploadImage($totalUnitsItem, $item);
                }
            }
            if ($color != null) {
                foreach ($color as $item){
                    $totalUnitsItem->color()->save(resolve(ColorService::class)->find($item));
                }
            }
            if ($size !== null) {
                foreach ($size as $item){
                    $totalUnitsItem->size()->save(resolve(SizeService::class)->find($item));
                }
            }

            DB::commit();


        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
            throw new \Exception(trans("custom.defaults.store_failed"));
        }

        return $totalUnitsItem;

    }


    public function all()
    {
        return $this->productRepository->getByInput();
    }
    public function uploadImage($guild, $file)
    {
        $destinationPath = "public/productGroup/" . $guild->id;
        ImageService::saveImage(image: $file, model: $guild, is_cover: false, is_public: true, destinationPath: $destinationPath);
    }

    public function shopIndexPage(): object
    {
        $groupService = resolve(ProductGroupService::class);
        $groups = $groupService->all();

        /*$sizeService = resolve(SizeSe::class);
        $sizes = $groupService->all();*/

        return (object)array("groups"=>$groups);
    }

    public function productDetail($slug)
    {
        return $this->productRepository->findBy("slug",$slug);
    }
}
