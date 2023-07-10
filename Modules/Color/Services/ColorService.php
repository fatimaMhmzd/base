<?php

namespace Modules\Color\Services;

use Illuminate\Support\Facades\DB;
use Modules\Color\Http\Repositories\ColorRepository;
use Modules\Color\Http\Requests\color\ValidateColorRequest;
use Yajra\DataTables\Facades\DataTables;

class ColorService
{
    public function __construct(public ColorRepository $colorRepository)
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
        $all = $this->colorRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $data = $this->colorRepository->getByInput();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_color_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_color_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->addColumn('color', function ($row) {
                $color = "";
                if ($row->code != null) {
                    $color = '<div style="color:'.$row->code.';">'.$row->code.'</div>';
                }
                return $color;
            })
            ->rawColumns(['action', 'color'])
            ->make(true);
    }

    public function find($id)
    {
        return $this->colorRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->colorRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->colorRepository->delete($item);
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

    public function update(ValidateColorRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->colorRepository->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->colorRepository->update($totalUnitItem, $inputs);
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

    public function store(ValidateColorRequest $request)
    {
        $inputs = $request->validated();


        $exist = $this->colorRepository->findBy("title", $inputs["title"]);
        if (!$exist) {


            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->colorRepository->create($inputs);
                DB::commit();
                return $totalUnitsItem;
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.store_failed"));
            }
        } else {
            throw new \Exception(trans("custom.publicContent.item_with_application_id_already_exist"));
        }


    }


    public function all()
    {
        return $this->colorRepository->getByInput();
    }

}
