<?php

namespace Modules\Blog\Services;

use Illuminate\Support\Facades\DB;
use Modules\Blog\Http\Repositories\BlogGroupRepository;
use Modules\Blog\Http\Requests\group\ValidateBlogGroupRequest;
use Modules\Polymorphism\Services\ImageService;
use Yajra\DataTables\Facades\DataTables;

class BlogGroupService
{
    public function __construct(public BlogGroupRepository $blogGroupRepository)
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
        $all = $this->blogGroupRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }


    public function ajax()
    {
        $data = $this->blogGroupRepository->getByInput();
        return  Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_blog_group_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_blog_group_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->addColumn('image', function ($row) {
                $img = '';
                if ($row->image) {
                    $img = '<img src="/' . $row->image->url. '" class="danger w-25"/>';
                }

                return $img;
            })

            ->rawColumns(['action','image'])
            ->make(true);

    }

    public function find($id)
    {
        return $this->blogGroupRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->blogGroupRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->blogGroupRepository->delete($item);
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

    public function update(ValidateBlogGroupRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->blogGroupRepository->find($id);
        if ($totalUnitItem) {
            $inputs["father_id"]=0;
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->blogGroupRepository->update($totalUnitItem, $inputs);
                DB::commit();
                $image = $inputs["file"] ?? null;
                if ($image !== null) {

                    $this->uploadImage($totalUnitItem, $image);
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

    public function store(ValidateBlogGroupRequest $request)
    {
        $inputs = $request->validated();
        $inputs["father_id"]=0;
        DB::beginTransaction();
        try {
            $totalUnitsItem = $this->blogGroupRepository->create($inputs);
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
        return $this->blogGroupRepository->getByInput(relations: []);
    }


    public function uploadImage($guild, $file)
    {
        $destinationPath = "public/blogGroup/" . $guild->id;
        ImageService::saveImage(image: $file, model: $guild, is_cover: false, is_public: true, destinationPath: $destinationPath);
    }



}
