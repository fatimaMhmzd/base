<?php

namespace Modules\Location\Services;

use Illuminate\Support\Facades\DB;
use Modules\Location\Http\Repositories\CityRepository;
use Modules\Location\Http\Requests\city\ValidateCityRequest;
use Yajra\DataTables\Facades\DataTables;

class CityService
{
    public function __construct(public CityRepository $cityRepository)
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
        $all = $this->cityRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $data = $this->cityRepository->getByInput();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_location_city_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_location_city_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function find($id)
    {
        return $this->cityRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->cityRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->cityRepository->delete($item);
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

    public function update(ValidateCityRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->cityRepository->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->cityRepository->update($totalUnitItem, $inputs);
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

    public function store(ValidateCityRequest $request)
    {
        $inputs = $request->validated();
        $inputs["country_id"] = $inputs["country_id"] ?? 1;

            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->cityRepository->create($inputs);
                DB::commit();
                return $totalUnitsItem;
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.store_failed"));
            }


    }


    public function all()
    {
        return $this->cityRepository->getByInput();
    }
    public function getCity($provinceId)
    {
        $filter[] = (object)[
            "col" => "province_id",
            "value" => $provinceId,
            "like" => false,
        ];
        return $this->cityRepository->getByInput($filter);
    }

}
