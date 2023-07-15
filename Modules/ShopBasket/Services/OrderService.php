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
        $item = $this->factorRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->factorRepository->delete($item);
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

    public function store($id , $propertyId = 0 ,$count =1)
    {
        $factor =[];
        $factorItem =[];
        if ($propertyId != 0){
            $product = resolve(ProductPropertyService::class)->find($propertyId);
        }else{
            $product = resolve(ProductService::class)->find($propertyId);
        }
        $factor["user_id"] = Auth::id();
        $factor["factor_status"] =0;

        $factorItem["product_id"] = $id;
        $factorItem["product_properties_id"] = $propertyId;
        $factorItem["color_id"] = $product->color_id;
        $factorItem["size_id"] = $product->size_id;



            DB::beginTransaction();
            try {
                $totalUnit= $this->factorRepository->firstOrCreate($factor);
                $factorItem["factor_id"] = $totalUnit->id;
                $totalUnitsItem = $this->factorItemRepository->firstOrCreate($factorItem);
                $factorItemUpdate["count"] = $totalUnitsItem->count + $count ;
                $factorItemUpdate["last_price"] = $product->price;
                $factorItemUpdate["total_price"] =$totalUnitsItem->total_price +($product->price * $count) ;
                $totalUnitItemUpdated = $this->factorItemRepository->update($totalUnitsItem, $factorItemUpdate);
                $factorUpdate["total_part_price"] = $totalUnit->total_part_price + ($product->price * $count);
                $factorUpdate["total_amount"] = $totalUnit->total_amount + ($product->price * $count);
                $totalUnitUpdated = $this->factorRepository->update($totalUnit, $factorUpdate);

                DB::commit();
                return $totalUnitItemUpdated;

            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.store_failed"));
            }

        return $totalUnitsItem;

    }


    public function all()
    {
        return $this->factorRepository->getByInput();
    }
    public function uploadImage($guild, $file)
    {
        $destinationPath = "public/page/" . $guild->id;
        ImageService::saveImage(image: $file, model: $guild, is_cover: false, is_public: true, destinationPath: $destinationPath);
    }

    public function indexPageData(): object
    {
        $socialMediaService = resolve(SocialMediaService::class);
        $allSocialMedia = $socialMediaService->all();

        return (object)array("allSocialMedia"=>$allSocialMedia);
    }
}
