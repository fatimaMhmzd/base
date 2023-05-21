<?php

namespace Modules\SocialMedia\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\Polymorphism\Services\ImageService;
use Modules\SocialMedia\Http\Repositories\SocialMediaRepository;
use Modules\SocialMedia\Http\Requests\socialMedia\ValidateSocialMediaRequest;

class SocialMediaService
{
    public function __construct(public SocialMediaRepository $socialMediaRepository)
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
        $all = $this->socialMediaRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $all = $this->socialMediaRepository->getByInput();
        return $all;
    }

    public function find($id)
    {
        return $this->socialMediaRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->socialMediaRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->socialMediaRepository->delete($item);
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

    public function update(ValidateSocialMediaRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->socialMediaRepository->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->socialMediaRepository->update($totalUnitItem, $inputs);
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

    public function store(ValidateSocialMediaRequest $request)
    {
        $inputs = $request->validated();
        $exist = $this->socialMediaRepository->findBy("title", $inputs["title"]);
        if (!$exist) {



            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->socialMediaRepository->create($inputs);
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
        return $this->socialMediaRepository->getByInput();
    }
    public function uploadImage($guild, $file)
    {
        $destinationPath = "public/socialMedia/" . $guild->id;
        ImageService::saveImage(image: $file, model: $guild, is_cover: false, is_public: true, destinationPath: $destinationPath);
    }

}
