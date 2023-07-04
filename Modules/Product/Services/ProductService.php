<?php

namespace Modules\Product\Services;

use Illuminate\Support\Facades\DB;
use Modules\Polymorphism\Services\ImageService;
use Modules\Product\Http\Repositories\ProductGroupRepository;
use Modules\Product\Http\Repositories\ProductRepository;
use Modules\Product\Http\Requests\product\ValidateProductRequest;
use Modules\Product\Http\Requests\productGroup\ValidateProductGroupRequest;

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
        return $all;
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

                    $this->uploadImage($totalUnitItemUpdated, $image);
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

        DB::beginTransaction();
        try {
            $totalUnitsItem = $this->productRepository->create($inputs);
            DB::commit();
            $image = $inputs["file"] ?? null;
            if ($image !== null) {
                $this->uploadImage($totalUnitsItem, $image);
            }

        } catch (\Exception $exception) {
            DB::rollBack();
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
}