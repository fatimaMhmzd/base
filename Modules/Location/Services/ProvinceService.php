<?php

namespace Modules\Location\Services;

use Illuminate\Support\Facades\DB;
use Modules\Location\Http\Repositories\ProvinceRepository;
use Modules\Location\Http\Requests\province\ValidateProvinceRequest;
use Yajra\DataTables\Facades\DataTables;

class ProvinceService
{
    public function __construct(public ProvinceRepository $provinceRepository)
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
        $all = $this->provinceRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $data = $this->provinceRepository->getByInput();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_location_province_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_location_province_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->addColumn('country', function ($row) {
                $country = '';
                $countryItem = resolve(CountryService::class)->find($row->country_id);
                if ($countryItem){
                    $country = $countryItem->fa_name .'(' .   $countryItem->en_name . ')';
                }

                return $country;
            })
            ->rawColumns(['action','country'])
            ->make(true);
    }

    public function find($id)
    {
        return $this->provinceRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->provinceRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->provinceRepository->delete($item);
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

    public function update(ValidateProvinceRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->provinceRepository->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->provinceRepository->update($totalUnitItem, $inputs);
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

    public function store(ValidateProvinceRequest $request)
    {
        $inputs = $request->validated();
        $inputs["country_id"] = $inputs["country_id"] ?? 1;
            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->provinceRepository->create($inputs);
                DB::commit();
                return $totalUnitsItem;
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.store_failed"));
            }




    }


    public function all()
    {
        return $this->provinceRepository->getByInput();
    }
    public function getProvince($countryId)
    {
        $filter[] = (object)[
            "col" => "country_id",
            "value" => $countryId,
            "like" => false,
        ];
        return $this->provinceRepository->getByInput($filter);
    }

}
