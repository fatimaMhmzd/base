<?php

namespace Modules\Group\Services;

use Illuminate\Support\Facades\DB;
use Modules\Group\Http\Repositories\GroupRepository;
use Modules\Group\Http\Requests\group\ValidateGroupRequest;
use Modules\Polymorphism\Entities\Images;
use Modules\Polymorphism\Services\ImageService;

class GroupService
{
    public function __construct(public GroupRepository $groupRepository)
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
        if ($request->father_id) {
            $filter[] = (object)[
                "col" => "father_id",
                "value" => $request->town_id,
                "like" => false,
            ];
        }
        $all = $this->groupRepository->getByInput($filter, $request->perPage, $request->pageNumber,['image']);
        return $all;
    }

    public function find($id)
    {
        return $this->groupRepository->find($id);
    }


    public function store(ValidateGroupRequest $request)
    {
        $inputs = $request->validated();
            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->groupRepository->create($inputs);
                DB::commit();

                $image = $inputs["file"] ?? null;
                if ($image !== null) {
                    $this->uploadGroupImage($totalUnitsItem, $image);
                }

                return $totalUnitsItem;
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.store_failed"));
            }


    }


    public function update(ValidateGroupRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->groupRepository->find($id);
        if ($totalUnitItem) {
            $exist = $this->groupRepository->findBy("title", $inputs["title"]);
            if (!$exist) {


                DB::beginTransaction();
                try {
                    $totalUnitItemUpdated = $this->groupRepository->update($totalUnitItem, $inputs);
                    DB::commit();

                } catch (\Exception $exception) {
                    DB::rollBack();
                    throw new \Exception(trans("custom.defaults.update_failed"));
                }
                $image = $inputs["file"] ?? null;
                if ($image !== null) {
                    if ($totalUnitItem->image) {
                        Images::query()->where("id", $totalUnitItem->image->id)->delete();
                    }
                    $this->uploadGroupImage($totalUnitItem, $image);
                }
                return $totalUnitItemUpdated;
            } else {
                throw new \Exception(trans("custom.publicContent.item_with_application_id_already_exist"));
            }
        } else {
            throw new \Exception(trans("custom.defaults.not_found"));
        }
    }

    public function delete($id)
    {
        $item = $this->groupRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->groupRepository->delete($item);
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


    public function uploadGroupImage($group, $file)
    {
        $destinationPath = "public/group/" . $group->id;
        ImageService::saveImage(image: $file, model: $group, is_cover: false, is_public: true, destinationPath: $destinationPath);
    }

    public function getGroup()
    {
        return $this->groupRepository->getBy('father_id', 0, 100);
    }
}
