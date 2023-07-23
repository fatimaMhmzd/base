<?php

namespace Modules\Product\Services;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class WishListServices
{
    public function __construct(public WishListRepository $productPropertyRepository)
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
        $all = $this->productPropertyRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }


    public function ajax($id)
    {
        $filter[] = (object)[
            "col" => "product_id",
            "value" => $id,
            "like" => false,
        ];

        $all = $this->productPropertyRepository->getByInput($filter);


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
        return $this->productPropertyRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->productPropertyRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->productPropertyRepository->delete($item);
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

    public function update(ValidatePropertiesRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->productPropertyRepository->find($id);
        if ($totalUnitItem) {
            $inputs["father_id"]=0;
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->productPropertyRepository->update($totalUnitItem, $inputs);
                DB::commit();
                $image = $inputs["file"] ?? null;
                if ($image !== null) {

                    $this->uploadImage($totalUnitItemUpdated, $image);
                }

            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.update_failed"));
            }

        } else {
            throw new \Exception(trans("custom.defaults.not_found"));
        }

        return $totalUnitItemUpdated;
    }

    public function store(ValidatePropertiesRequest $request)
    {
        $inputs = $request->validated();
        $inputs["price"] = $inputs["price"] ?? 0 ;
        $inputs["available"] = $inputs["available"] ?? 0 ;
        DB::beginTransaction();
        try {
            $totalUnitsItem = $this->productPropertyRepository->create($inputs);
            DB::commit();
            $image = $inputs["file"] ?? null;
            if ($image !== null) {
                $this->uploadImage($totalUnitsItem, $image);
            }


        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception(trans("custom.defaults.store_failed"));
        }

        return $totalUnitsItem;

    }

    public function uploadImage($guild, $file)
    {
        $destinationPath = "public/productProperty/" . $guild->id;
        ImageService::saveImage(image: $file, model: $guild, is_cover: false, is_public: true, destinationPath: $destinationPath);
    }

}
