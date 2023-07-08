<?php

namespace Modules\Product\Services;

use Illuminate\Support\Facades\DB;
use Modules\Polymorphism\Services\ImageService;
use Modules\Product\Entities\ProductGroup;
use Modules\Product\Http\Repositories\ProductGroupRepository;
use Modules\Product\Http\Requests\productGroup\ValidateProductGroupRequest;

class ProductGroupService
{
    public function __construct(public ProductGroupRepository $productGroupRepository)
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
        $all = $this->productGroupRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }
    public function subGroup($fatherId)
    {

            $filter[] = (object)[
                "col" => "father_id",
                "value" => $fatherId,
                "like" => false,
            ];

        $all = $this->productGroupRepository->getByInput($filter);
        return $all;
    }

    public function ajax()
    {
        $all = $this->productGroupRepository->getByInput();
        return $all;
    }

    public function find($id)
    {
        return $this->productGroupRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->productGroupRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->productGroupRepository->delete($item);
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

    public function update(ValidateProductGroupRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->productGroupRepository->find($id);
        if ($totalUnitItem) {
            $inputs["father_id"]=0;
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->productGroupRepository->update($totalUnitItem, $inputs);
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

    public function store(ValidateProductGroupRequest $request)
    {
        $inputs = $request->validated();
        $inputs["father_id"]=0;
            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->productGroupRepository->create($inputs);
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


    public function all(): \Illuminate\Support\Collection
    {
        return $this->productGroupRepository->getByInput();
    }
    public function uploadImage($guild, $file)
    {
        $destinationPath = "public/productGroup/" . $guild->id;
        ImageService::saveImage(image: $file, model: $guild, is_cover: false, is_public: true, destinationPath: $destinationPath);
    }

    public function cartItems(): array
    {
        return [];
    }

}
