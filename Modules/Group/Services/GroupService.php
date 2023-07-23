<?php

namespace Modules\Group\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Group\Http\Repositories\GroupRepository;
use Modules\Group\Http\Requests\group\ValidateGroupRequest;
use Modules\Polymorphism\Entities\Images;
use Modules\Polymorphism\Services\ImageService;
use Yajra\DataTables\Facades\DataTables;

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

    public function ajax()
    {
        $all = $this->groupRepository->getByInput();
        return  Datatables::of($all)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_group_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_group_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->addColumn('image', function ($row) {
                $img = '';
                if ($row->image) {
                    $img = '<img src="/' . $row->image->url. '" class="danger w-25"/>';
                }

                return $img;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    public function find($id)
    {
        return $this->groupRepository->find($id);
    }


    public function store(ValidateGroupRequest $request)
    {
        $inputs = $request->validated();
        $inputs["father_id"]=0;
        DB::beginTransaction();
        try {
            $totalUnitsItem = $this->groupRepository->create($inputs);
            DB::commit();
            $image = $inputs["file"] ?? null;
            if ($image !== null) {
                $this->uploadGroupImage($totalUnitsItem, $image);
            }

        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception(trans("custom.defaults.store_failed"));
        }

        return $totalUnitsItem;

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
