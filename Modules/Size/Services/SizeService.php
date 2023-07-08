<?php

namespace Modules\Size\Services;

use Illuminate\Support\Facades\DB;
use Modules\Polymorphism\Services\ImageService;
use Modules\Size\Http\Repositories\SizeRepository;
use Modules\Size\Http\Requests\size\ValidateSizeRequest;
use Yajra\DataTables\Facades\DataTables;

class SizeService
{
    public function __construct(public SizeRepository $sizeRepository)
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
        $all = $this->sizeRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $data = $this->sizeRepository->getByInput();
        return  Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_size_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_size_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);

    }

    public function find($id)
    {
        return $this->sizeRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->sizeRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->sizeRepository->delete($item);
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

    public function update(ValidateSizeRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->sizeRepository->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->sizeRepository->update($totalUnitItem, $inputs);
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

    public function store(ValidateSizeRequest $request)
    {
        $inputs = $request->validated();

        $exist = $this->sizeRepository->findBy("title", $inputs["title"]);
        if (!$exist) {
            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->sizeRepository->create($inputs);
                DB::commit();

            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.store_failed"));
            }
        } else {
            throw new \Exception(trans("custom.publicContent.item_with_application_id_already_exist"));
        }

        $image = $inputs["file"] ?? null;
        if ($image !== null) {

            $this->uploadImage($totalUnitsItem, $image);


        }
        return $totalUnitsItem;

    }


    public function all()
    {
        return $this->sizeRepository->getByInput();
    }


}
