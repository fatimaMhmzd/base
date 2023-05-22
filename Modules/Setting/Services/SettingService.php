<?php

namespace Modules\Setting\Services;

use Illuminate\Support\Facades\DB;
use Modules\Polymorphism\Services\ImageService;
use Modules\Setting\Http\Repositories\SettingRepository;
use Modules\Setting\Http\Requests\setting\ValidateSettingRequest;

class SettingService
{
    public function __construct(public SettingRepository $settingRepositoryy)
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
        $all = $this->settingRepositoryy->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $all = $this->settingRepositoryy->getByInput();
        return $all;
    }

    public function find($id)
    {
        return $this->settingRepositoryy->find($id);
    }

    public function delete($id)
    {
        $item = $this->settingRepositoryy->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->settingRepositoryy->delete($item);
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

    public function update(ValidateSettingRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->settingRepositoryy->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->settingRepositoryy->update($totalUnitItem, $inputs);
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

    public function store(ValidateSettingRequest $request)
    {
        $inputs = $request->validated();
        $exist = $this->settingRepositoryy->findBy("key", $inputs["key"]);
        if (!$exist) {



            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->settingRepositoryy->create($inputs);
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
        return $this->settingRepositoryy->getByInput();
    }
    public function uploadImage($guild, $file)
    {
        $destinationPath = "public/setting/" . $guild->id;
        ImageService::saveImage(image: $file, model: $guild, is_cover: false, is_public: true, destinationPath: $destinationPath);
    }

}
