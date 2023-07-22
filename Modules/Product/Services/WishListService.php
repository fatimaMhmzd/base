<?php

namespace Modules\Product\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Product\Http\Repositories\WishListRepository;
use Modules\Product\Http\Requests\wishList\ValidateWishListRequest;
use Yajra\DataTables\Facades\DataTables;

class WishListService
{
    public function __construct(public WishListRepository $wishListRepository)
    {
    }

    public function index($request)
    {
        $filter = [];

            $filter[] = (object)[
                "col" => "user_id",
                "value" => Auth::id(),
                "like" => true,
            ];

        $all = $this->wishListRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }


    public function ajax($id)
    {
        $filter[] = (object)[
            "col" => "product_id",
            "value" => $id,
            "like" => false,
        ];

        $all = $this->wishListRepository->getByInput($filter);


        return  Datatables::of($all)
            ->addIndexColumn()
            ->addColumn('size', function ($row) {
                $size = '';
                if ($row->size) {
                    $size = $row->size->title;
                }

                return $size;
            })
            ->addColumn('color', function ($row) {
                $color = "";
                if ($row->color != null) {
                    $color = '<div style="color:'.$row->color->code.';">'.$row->color->code.'</div>';
                }
                return $color;
            })
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_product_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>';

                return $btn;
            })
            ->addColumn('image', function ($row) {
                $img = '';
                if ($row->image) {
                    $img = '<img src="/' . $row->image->url. '" class="danger w-25"/>';
                }

                return $img;
            })
            ->rawColumns(['action', 'image' ,'size' , 'color'])
            ->make(true);
    }

    public function find($id)
    {
        return $this->wishListRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->wishListRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->wishListRepository->delete($item);
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

    public function update(ValidateWishListRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->wishListRepository->find($id);
        if ($totalUnitItem) {

            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->wishListRepository->update($totalUnitItem, $inputs);
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

    public function store(Request $request)
    {
        $res = false;
      /*  $inputs = $request->validated();*/
        $inputs['user_id']=Auth::id();
        $inputs['product_id']=$request->productId;

        DB::beginTransaction();
        try {
            $item = $this->wishListRepository->findWithInputs($inputs);
            if (!$item){
                $totalUnitsItem = $this->wishListRepository->create($inputs);
                $res = true;
            }else{
                $totalUnitsItem = $this->wishListRepository->delete($item);
                $res = false;
            }

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception(trans("custom.defaults.store_failed"));
        }

        return $res;

    }


}
