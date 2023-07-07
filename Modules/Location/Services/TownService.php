<?php

namespace Modules\Location\Services;

use Illuminate\Support\Facades\DB;
use Modules\Location\Http\Repositories\TownRepository;
use Modules\Location\Http\Requests\town\ValidateTownRequest;
use Yajra\DataTables\Facades\DataTables;

class TownService
{
    public function __construct(public TownRepository $townRepository)
    {
    }

    public function index($request)
    {
        $filter = [];
        if ($request->title) {
            $filter[] = (object)[
                "col" => "fa_name",
                "value" => $request->title,
                "like" => true,
            ];
        }
        $all = $this->townRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $data = $this->townRepository->getByInput();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_location_town_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_location_town_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function find($id)
    {
        return $this->townRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->townRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->townRepository->delete($item);
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

    public function update(ValidateTownRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->townRepository->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->townRepository->update($totalUnitItem, $inputs);
                DB::commit();
                return $totalUnitItemUpdated;
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.update_failed"));
            }

        } else {
            throw new \Exception(trans("custom.defaults.not_found"));
        }


    }

    public function store(ValidateTownRequest $request)
    {
        $inputs = $request->validated();
        $inputs["country_id"] = $inputs["country_id"] ?? 1;
        $inputs["province_id"] = $inputs["province_id"] ?? 0;

            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->townRepository->create($inputs);
                DB::commit();
                return $totalUnitsItem;
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.store_failed"));
            }
    }


    public function all()
    {
        return $this->townRepository->getByInput();
    }

}
