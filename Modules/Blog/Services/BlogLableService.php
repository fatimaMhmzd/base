<?php

namespace Modules\Blog\Services;

use Illuminate\Support\Facades\DB;
use Modules\Blog\Http\Repositories\BlogLableRepository;
use Yajra\DataTables\Facades\DataTables;

class BlogLableService
{
    public function __construct(public BlogLableRepository $blogLableRepository)
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
        $all = $this->blogLableRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }


    public function ajax()
    {
        $data = $this->blogLableRepository->getByInput();
        return  Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_blog_lable_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_blog_lable_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })


            ->rawColumns(['action'])
            ->make(true);

    }

    public function find($id)
    {
        return $this->blogLableRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->blogLableRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->blogLableRepository->delete($item);
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

    public function update(ValidateLableRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->blogLableRepository->find($id);
        if ($totalUnitItem) {

            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->blogLableRepository->update($totalUnitItem, $inputs);
                DB::commit();

            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.update_failed"));
            }

        } else {
            throw new \Exception(trans("custom.defaults.not_found"));
        }

        return $totalUnitItemUpdated;
    }

    public function store(ValidatelableRequest $request)
    {
        $inputs = $request->validated();

        DB::beginTransaction();
        try {
            $totalUnitsItem = $this->blogLableRepository->create($inputs);
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception(trans("custom.defaults.store_failed"));
        }

        return $totalUnitsItem;

    }


    public function all(): \Illuminate\Support\Collection
    {
        return $this->blogLableRepository->getByInput();
    }


}
