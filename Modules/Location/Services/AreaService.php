<?php

namespace Modules\Location\Services;

use Illuminate\Support\Facades\DB;
use Modules\Location\Http\Repositories\AreaRepository;
use Modules\Location\Http\Requests\area\ValidateAreaRequest;
use Yajra\DataTables\Facades\DataTables;

class AreaService
{
    public function __construct(public AreaRepository $areaRepository)
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
        $all = $this->areaRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $data = $this->areaRepository->getByInput();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_location_area_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_location_area_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function find($id)
    {
        return $this->areaRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->areaRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->areaRepository->delete($item);
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

    public function update(ValidateAreaRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->areaRepository->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->areaRepository->update($totalUnitItem, $inputs);
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

    public function store(ValidateAreaRequest $request)
    {
        $inputs = $request->validated();
        $inputs["country_id"] = $inputs["country_id"] ?? 1;
        $inputs["province_id"] = $inputs["province_id"] ?? 0;
        $inputs["city_id"] = $inputs["city_id"] ?? 0;



            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->areaRepository->create($inputs);
                DB::commit();
                return $totalUnitsItem;
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.store_failed"));
            }

    }


    public function all()
    {
        return $this->areaRepository->getByInput();
    }

}
