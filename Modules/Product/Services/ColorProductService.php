<?php

namespace Modules\Product\Services;

use Illuminate\Support\Facades\DB;
use Modules\Polymorphism\Services\ImageService;
use Modules\Product\Http\Repositories\ColorProductRepository;

class ColorProductService
{
    public function __construct(public ColorProductRepository $colorProductRepository)
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
        $all = $this->colorProductRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $all = $this->colorProductRepository->getByInput();
        return $all;
    }

    public function find($id)
    {
        return $this->colorProductRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->colorProductRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->colorProductRepository->delete($item);
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
        $totalUnitItem = $this->colorProductRepository->find($id);
        if ($totalUnitItem) {
            $inputs["father_id"]=0;
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->colorProductRepository->update($totalUnitItem, $inputs);
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
            $totalUnitsItem = $this->colorProductRepository->create($inputs);
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
        return $this->colorProductRepository->getByInput();
    }
    public function uploadImage($guild, $file)
    {
        $destinationPath = "public/productGroup/" . $guild->id;
        ImageService::saveImage(image: $file, model: $guild, is_cover: false, is_public: true, destinationPath: $destinationPath);
    }

}
