<?php

namespace Modules\ShopBasket\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Modules\Product\Services\ProductPropertyService;
use Modules\Product\Services\ProductService;
use Modules\ShopBasket\Http\Repositories\FactorItemRepository;
use Modules\ShopBasket\Http\Repositories\FactorRepository;
use Modules\ShopBasket\Http\Requests\order\ValidateOrderRequest;

class OrderService
{
    public function __construct(public FactorRepository $factorRepository , public FactorItemRepository $factorItemRepository)
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


    public function delete($id)
    {
        $item = $this->factorItemRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->factorItemRepository->delete($item);
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

    public function update(ValidateOrderRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->factorRepository->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->factorRepository->update($totalUnitItem, $inputs);
                DB::commit();
                return $totalUnitItemUpdated;
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.update_failed"));
            }

        } else {
            throw new \Exception(trans("custom.defaults.not_found"));
        }
        $image = $inputs["file"] ?? null;
        if ($image !== null) {
            foreach ($image as $item){
                $this->uploadImage($totalUnitsItem, $item);
            }

        }
        return $totalUnitsItem;
    }

    public function store($request)
    {
        $factor =[];
        $factorItem =[];

        if ($request->propertyId){
            $colorId =resolve(ProductPropertyService::class)->find($request->propertyId)->color_id;
            $sizeId =resolve(ProductPropertyService::class)->find($request->propertyId)->size_id;
            $price =resolve(ProductPropertyService::class)->find($request->propertyId)->price;
        }else{
            $price = resolve(ProductService::class)->find($request->productId)->price;
        }
        $factor["user_id"] = Auth::id();
        $factor["factor_status"] =0;

        $factorItem["product_id"] = $request->productId;
        $factorItem["product_properties_id"] = $request->propertyId ?? 0;
        $factorItem["color_id"] = $colorId ?? null;
        $factorItem["size_id"] = $sizeId ?? null;

            DB::beginTransaction();
            try {
                $totalUnit= $this->factorRepository->firstOrCreate($factor);
                $factorItem["factor_id"] = $totalUnit->id;
                $totalUnitsItem = $this->factorItemRepository->firstOrCreate($factorItem);
                $count =$request->count ?? 1 ;

                if ($request->opr == "-"){

                        $factorItemUpdate["count"] = $totalUnitsItem->count - $count ;


                }
                elseif ($request->opr == "+"){

                        $factorItemUpdate["count"] = $totalUnitsItem->count + $count ;

                }else{
                    $factorItemUpdate["count"] = $count ;
                }


                $factorItemUpdate["last_price"] = $price;
                $factorItemUpdate["total_price"] =$price * $factorItemUpdate["count"] ;
                $totalUnitItemUpdated = $this->factorItemRepository->update($totalUnitsItem, $factorItemUpdate);

                $factorUpdate["total_part_price"] = $totalUnit->total_part_price + $factorItemUpdate["total_price"];
                $factorUpdate["total_amount"] = $totalUnit->total_amount + $factorItemUpdate["total_price"];
                $totalUnitUpdated = $this->factorRepository->update($totalUnit, $factorUpdate);

                DB::commit();
                return $totalUnitItemUpdated;

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
