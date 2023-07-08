<?php

namespace Modules\Location\Services;

use Illuminate\Support\Facades\DB;
use Modules\Location\Http\Repositories\CountryRepository;
use Modules\Location\Http\Requests\country\ValidateCountryRequest;
use Yajra\DataTables\Facades\DataTables;

class CountryService
{
    public function __construct(public CountryRepository $countryRepository)
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
        $all = $this->countryRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $data = $this->countryRepository->getByInput();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_unit_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_unit_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function find($id)
    {
        return $this->countryRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->countryRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->countryRepository->delete($item);
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

    public function update(ValidateCountryRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->countryRepository->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->countryRepository->update($totalUnitItem, $inputs);
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

    public function store(ValidateCountryRequest $request)
    {
        $inputs = $request->validated();


            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->countryRepository->create($inputs);
                DB::commit();
                return $totalUnitsItem;
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.store_failed"));
            }




    }


    public function all()
    {
        return $this->countryRepository->getByInput();
    }

}
