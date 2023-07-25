<?php

namespace Modules\ShopBasket\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Modules\Product\Services\PriceProductService;
use Modules\Product\Services\ProductPropertyService;
use Modules\Product\Services\ProductService;
use Modules\ShopBasket\Http\Repositories\FactorItemRepository;
use Modules\ShopBasket\Http\Repositories\FactorRepository;
use Modules\ShopBasket\Http\Requests\order\ValidateOrderRequest;

class OrderService
{
    public function __construct(public FactorRepository $factorRepository, public FactorItemRepository $factorItemRepository)
    {
    }

    public function index()
    {
        $filter = [];
        $filter[] = (object)[
            "col" => "user_id",
            "value" => Auth::id(),
            "like" => false,
        ];
        $filter[] = (object)[
            "col" => "factor_status",
            "value" => 0,
            "like" => false,
        ];

        $all = $this->factorRepository->getByInput($filter);
        return $all;
    }

    public function show()
    {
        $filter = [];
        $parts = [];
        $inputs[] = (object)[
            "col" => "user_id",
            "value" => Auth::id(),
        ];
        $inputs[] = (object)[
            "col" => "factor_status",
            "value" => 0,
        ];

        $all = $this->factorRepository->findWithInputs($inputs);
        if ($all and count($all->part) != 0) {
            foreach ($all->part as $item) {
                $partItem = (object)[
                    "id" => $item->id,
                    "title" => $item->product->title,
                    "sub_title" => $item->product->sub_title,
                    "banner" => $item->product->banner,
                    "slug" => $item->product->slug,
                    "count" => $item->count,
                    "total_price" => $item->total_price,
                    "price" => $item->product->price,
                    "off_price" => $item->product->off_price,

                ];
                array_push($parts, $partItem);
            }
        }
        $res = (object)[
            "total_part_price" => $all->total_part_price,
            "total_amount" => $all->total_amount,
            "part" => $parts,
        ];

        return $res;
    }


    public function delete($id)
    {
        $item = $this->factorItemRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->factorItemRepository->delete($item);
                $totalUpdate = $this->update($item->factor_id);
                DB::commit();
                return $totalUpdate;
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.delete_failed"));
            }
        } else {
            throw new \Exception(trans("custom.defaults.not_found"));
        }
    }

    public function update($id)
    {
        $factorUpdate = [];
        $total_part_price = 0;

        $totalUnitItem = $this->factorRepository->find($id);
        if ($totalUnitItem) {
            $filter[] = (object)[
                "col" => "factor_id",
                "value" => $totalUnitItem->id,
                "like" => false,
            ];
            DB::beginTransaction();
            try {
                $all = $this->factorItemRepository->getByInput($filter);
                if (!$all->isEmpty()) {
                    foreach ($all as $item) {
                        $factorItemUpdate = [];
                        $total_price = 0;
                        $count = $item->count;
                        $priceItem = resolve(PriceProductService::class)->findPrice($count, $item->product_id);

                        if ($priceItem) {
                            $total_price += $count * $priceItem->price;
                        } else {
                            $total_price += $count * $item->product->price;
                        }
                        $factorItemUpdate["last_price"] = $item->product->price;
                        $factorItemUpdate["total_price"] = $total_price;
                        $totalUnitItemUpdated = $this->factorItemRepository->update($item, $factorItemUpdate);
                        $total_part_price += $total_price;
                    }
                }
                $factorUpdate["total_part_price"] = $total_part_price;
                $factorUpdate["total_amount"] = $total_part_price;
                $totalUnitUpdated = $this->factorRepository->update($totalUnitItem, $factorUpdate);

                DB::commit();
                return $totalUnitItem;

            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.store_failed"));
            }
        }

    }

    public function store($request)
    {
        $factor = [];
        $factorItem = [];

        if ($request->propertyId) {
            $colorId = resolve(ProductPropertyService::class)->find($request->propertyId)->color_id;
            $sizeId = resolve(ProductPropertyService::class)->find($request->propertyId)->size_id;
            $price = resolve(ProductPropertyService::class)->find($request->propertyId)->price;
        } else {
            $price = resolve(ProductService::class)->find($request->productId)->price;
        }
        $factor["user_id"] = Auth::id();
        $factor["factor_status"] = 0;

        $factorItem["product_id"] = $request->productId;
        $factorItem["product_properties_id"] = $request->propertyId ?? 0;
        $factorItem["color_id"] = $colorId ?? null;
        $factorItem["size_id"] = $sizeId ?? null;

        DB::beginTransaction();
        try {
            $totalUnit = $this->factorRepository->firstOrCreate($factor);
            $factorItem["factor_id"] = $totalUnit->id;
            $totalUnitsItem = $this->factorItemRepository->firstOrCreate($factorItem);
            $count = $request->count ?? 1;

            if ($request->opr == "-") {

                $factorItemUpdate["count"] = $totalUnitsItem->count - $count;


            } elseif ($request->opr == "+") {

                $factorItemUpdate["count"] = $totalUnitsItem->count + $count;

            } else {
                $factorItemUpdate["count"] = $count;
            }

            $totalUnitItemUpdated = $this->factorItemRepository->update($totalUnitsItem, $factorItemUpdate);
            $totalUpdate = $this->update($factorItem["factor_id"]);

            DB::commit();
            return $totalUpdate;

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
            throw new \Exception(trans("custom.defaults.store_failed"));
        }


    }


    public function all()
    {
        return $this->factorRepository->getByInput();
    }

}
