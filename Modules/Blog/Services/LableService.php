<?php

namespace Modules\Blog\Services;

use Illuminate\Support\Facades\DB;
use Modules\Blog\Http\Repositories\LableRepository;
use Modules\Blog\Http\Requests\lable\ValidateLableRequest;
use Yajra\DataTables\Facades\DataTables;

class LableService
{
    public function __construct(public LableRepository $lableRepository)
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
        $all = $this->lableRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }


    public function ajax()
    {
        $data = $this->lableRepository->getByInput();
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
        return $this->lableRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->lableRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->lableRepository->delete($item);
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
        $totalUnitItem = $this->lableRepository->find($id);
        if ($totalUnitItem) {

            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->lableRepository->update($totalUnitItem, $inputs);
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
            $totalUnitsItem = $this->lableRepository->create($inputs);
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception(trans("custom.defaults.store_failed"));
        }

        return $totalUnitsItem;

    }


    public function all(): \Illuminate\Support\Collection
    {
        return $this->lableRepository->getByInput();
    }


}
