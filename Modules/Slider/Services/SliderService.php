<?php

namespace Modules\Slider\Services;

use Illuminate\Support\Facades\DB;
use Modules\Polymorphism\Services\ImageService;
use Modules\Slider\Http\Repositories\SliderRepository;
use Modules\Slider\Http\Requests\slider\ValidateSliderRequest;

class SliderService
{
    public function __construct(public SliderRepository $sliderRepository)
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
        $all = $this->sliderRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $all = $this->sliderRepository->getByInput();
        return $all;
    }

    public function find($id)
    {
        return $this->sliderRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->sliderRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->sliderRepository->delete($item);
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

    public function update(ValidateSliderRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->sliderRepository->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->sliderRepository->update($totalUnitItem, $inputs);
                DB::commit();
                return $totalUnitItemUpdated;
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.update_failed"));
            }

        } else {
            throw new \Exception(trans("custom.defaults.not_found"));
        }
        $image = $inputs["file"] ?? null;
        if ($image !== null) {
            foreach ($image as $item){
                $this->uploadImage($totalUnitsItem, $item);
            }

        }
        return $totalUnitsItem;
    }

    public function store(ValidateSliderRequest $request)
    {
        $inputs = $request->validated();
        $exist = $this->sliderRepository->findBy("title", $inputs["title"]);
        if (!$exist) {



            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->sliderRepository->create($inputs);
                DB::commit();
                return $totalUnitsItem;
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.store_failed"));
            }
        } else {
            throw new \Exception(trans("custom.publicContent.item_with_application_id_already_exist"));
        }

        $image = $inputs["file"] ?? null;
        if ($image !== null) {
            foreach ($image as $item){
                $this->uploadImage($totalUnitsItem, $item);
            }

        }
        return $totalUnitsItem;

    }


    public function all()
    {
        return $this->sliderRepository->getByInput();
    }
    public function uploadImage($guild, $file)
    {
        $destinationPath = "public/slider/" . $guild->id;
        ImageService::saveImage(image: $file, model: $guild, is_cover: false, is_public: true, destinationPath: $destinationPath);
    }

}
