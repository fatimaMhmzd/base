<?php

namespace Modules\Product\Services;

use Illuminate\Support\Facades\DB;
use Modules\Product\Http\Repositories\SuggestProductRepository;
use Modules\Product\Http\Requests\suggest\ValidateSuggestProductRequest;
use Yajra\DataTables\Facades\DataTables;

class SuggestProductService
{
    public function __construct(public SuggestProductRepository $suggestProductRepository)
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
        $all = $this->suggestProductRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }
    public function subGroup($fatherId)
    {

        $filter[] = (object)[
            "col" => "father_id",
            "value" => $fatherId,
            "like" => false,
        ];

        $all = $this->suggestProductRepository->getByInput($filter);
        return $all;
    }

    public function ajax()
    {
        $all = $this->suggestProductRepository->getByInput();
        return  Datatables::of($all)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_product_group_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_product_group_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->addColumn('image', function ($row) {
                $img = '';
                if ($row->image) {
                    $img = '<img src="/' . $row->image->url. '" class="danger w-25"/>';
                }

                return $img;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    public function find($id)
    {
        return $this->suggestProductRepository->find($id);
    }
    public function findBy($col, $value)
    {
        return $this->suggestProductRepository->findBy($col, $value);
    }

    public function delete($id)
    {
        $item = $this->suggestProductRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->suggestProductRepository->delete($item);
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

    public function update(ValidateSuggestProductRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->suggestProductRepository->find($id);
        if ($totalUnitItem) {

            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->suggestProductRepository->update($totalUnitItem, $inputs);
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

    public function store(ValidateSuggestRequest $request)
    {
        $inputs = $request->validated();

        DB::beginTransaction();
        try {
            $totalUnitsItem = $this->suggestProductRepository->create($inputs);
            DB::commit();


        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception(trans("custom.defaults.store_failed"));
        }

        return $totalUnitsItem;

    }


    public function all(): \Illuminate\Support\Collection
    {
        return $this->suggestProductRepository->getByInput();
    }

}
