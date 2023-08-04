<?php

namespace Modules\Address\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Address\Http\Repositories\AddressRepository;
use Modules\Address\Http\Requests\address\ValidateAddressRequest;
use Modules\Location\Entities\City;
use Modules\Location\Services\CountryService;
use Modules\Location\Services\ProvinceService;
use Yajra\DataTables\Facades\DataTables;

class AddressService
{
    public function __construct(public AddressRepository $addressRepository)
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
        $all = $this->addressRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }


    public function ajax()
    {
        $data = $this->addressRepository->getByInput();
        return Datatables::of($data)
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
        return $this->addressRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->addressRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->addressRepository->delete($item);
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

    public function update(ValidateAddressRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->addressRepository->find($id);
        if ($totalUnitItem) {

            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->addressRepository->update($totalUnitItem, $inputs);
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

    public function store(ValidateAddressRequest $request)
    {
        $inputs = $request->validated();
        $inputs['user_id'] = Auth::id();
        $inputs['name'] = $inputs['name'] ?? Auth::user()->name;
        $inputs['family'] = $inputs['family'] ?? Auth::user()->family;
        $inputs['mobile'] = $inputs['mobile'] ?? $inputs['tel'];
        $inputs['province_id'] = $inputs['province_id'] ?? 0;
        $inputs['city_id'] = $inputs['city_id'] ?? 0;

        $country = resolve(CountryService::class)->find($inputs['country_id'])->fa_name ?? "";
        $province = resolve(ProvinceService::class)->find($inputs['province_id'])->fa_name ?? "";
        $city = resolve(City::class)->find($inputs['city_id'])->fa_name ?? "";
        $inputs['total_address'] = $country + $province + $city + $inputs['address'];


        DB::beginTransaction();
        try {
            $totalUnitsItem = $this->addressRepository->create($inputs);
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception(trans("custom.defaults.store_failed"));
        }

        return $totalUnitsItem;

    }
    public function storeService($inputs)
    {
        $inputs['user_id'] = Auth::id();
        $inputs['name'] = $inputs['name'] ?? Auth::user()->name;
        $inputs['family'] = $inputs['family'] ?? Auth::user()->family;
        $inputs['mobile'] = $inputs['mobile'] ?? $inputs['tel'];
        $inputs['province_id'] = $inputs['province_id'] ?? 0;
        $inputs['city_id'] = $inputs['city_id'] ?? 0;


        $country = resolve(CountryService::class)->find($inputs['country_id'])->fa_name ?? "";
        $province = resolve(ProvinceService::class)->find($inputs['province_id'])->fa_name ?? "";
        $city = resolve(City::class)->find($inputs['city_id'])->fa_name ?? "";
        $inputs['total_address'] = $country .'-'. $province .'-'. $city .'-'. $inputs['address'];


        DB::beginTransaction();
        try {
            $totalUnitsItem = $this->addressRepository->create($inputs);
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception(trans("custom.defaults.store_failed"));
        }

        return $totalUnitsItem;

    }


    public function all(): \Illuminate\Support\Collection
    {
        return $this->addressRepository->getByInput();
    }

    public function myAddress(): \Illuminate\Support\Collection
    {
        return $this->addressRepository->all(array('user_id'=>Auth::id()),['user','province','city']);
    }


}
