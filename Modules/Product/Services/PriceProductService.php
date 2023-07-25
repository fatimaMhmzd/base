<?php

namespace Modules\Product\Services;

use http\Env\Request;
use Illuminate\Support\Facades\DB;
use Modules\Product\Http\Repositories\PriceProductRepository;
use Modules\Product\Http\Requests\price\ValidatePriceProductRequest;


class PriceProductService
{
    public function __construct(public PriceProductRepository $priceProductRepository)
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
        $all = $this->priceProductRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $all = $this->priceProductRepository->getByInput();
        return $all;
    }

    public function find($id)
    {
        return $this->priceProductRepository->find($id);
    }
    public function findPrice($number,$productId)
    {

        $queryItems = $this->priceProductRepository->by(query:null,col:'product_id',value:$productId);
        $queryItems = $this->priceProductRepository->byOperator(query:$queryItems ,col:'number',value:$number,operator:"<=");
        $queryItems = $this->priceProductRepository->orderBy(query:$queryItems ,orderByColumn:'number');
        return $queryItems->first();
    }

    public function delete($id)
    {
        $item = $this->priceProductRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->priceProductRepository->delete($item);
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

    public function update($request, $id)
    {
        $inputs = $request;
        $totalUnitItem = $this->priceProductRepository->find($id);
        if ($totalUnitItem) {

            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->priceProductRepository->update($totalUnitItem, $inputs);
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

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $totalUnitsItem = $this->priceProductRepository->create($request);
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception(trans("custom.defaults.store_failed"));
        }

        return $totalUnitsItem;

    }


    public function all(): \Illuminate\Support\Collection
    {
        return $this->priceProductRepository->getByInput();
    }

}
