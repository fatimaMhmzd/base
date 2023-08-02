<?php

namespace Modules\Product\Services;

use Illuminate\Support\Facades\DB;
use Modules\Product\Http\Repositories\SuggestRepository;
use Modules\Product\Http\Requests\suggest\ValidateSuggestRequest;
use Yajra\DataTables\Facades\DataTables;

class SuggestService
{
    public function __construct(public SuggestRepository $suggestRepository)
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
        $all = $this->suggestRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }
    public function subGroup($fatherId)
    {

        $filter[] = (object)[
            "col" => "father_id",
            "value" => $fatherId,
            "like" => false,
        ];

        $all = $this->suggestRepository->getByInput($filter);
        return $all;
    }

    public function ajax()
    {
        $all = $this->suggestRepository->getByInput();
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
        return $this->suggestRepository->find($id);
    }
    public function findBy($col, $value)
    {
        return $this->suggestRepository->findBy($col, $value);
    }

    public function delete($id)
    {
        $item = $this->suggestRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->suggestRepository->delete($item);
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

    public function update(ValidateSuggestRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->suggestRepository->find($id);
        if ($totalUnitItem) {

            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->suggestRepository->update($totalUnitItem, $inputs);
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
            $totalUnitsItem = $this->suggestRepository->create($inputs);
            DB::commit();


        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception(trans("custom.defaults.store_failed"));
        }

        return $totalUnitsItem;

    }


    public function all(): \Illuminate\Support\Collection
    {
        return $this->suggestRepository->getByInput();
    }

}
