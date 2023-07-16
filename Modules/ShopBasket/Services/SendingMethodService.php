<?php

namespace Modules\ShopBasket\Services;

use Illuminate\Support\Facades\DB;
use Modules\ShopBasket\Http\Repositories\SendingMethodRepository;
use Modules\ShopBasket\Http\Requests\sendingMethod\ValidateSendingMethodRequest;
use Yajra\DataTables\Facades\DataTables;

class SendingMethodService
{
    public function __construct(public SendingMethodRepository $sendingMethodRepository)
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
        $all = $this->sendingMethodRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $data = $this->sendingMethodRepository->getByInput();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_shop_basket_sending_method_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_shop_basket_sending_method_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function find($id)
    {
        return $this->sendingMethodRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->sendingMethodRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->sendingMethodRepository->delete($item);
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

    public function update(ValidateSendingMethodRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->sendingMethodRepository->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->sendingMethodRepository->update($totalUnitItem, $inputs);
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

    public function store(ValidateSendingMethodRequest $request)
    {
        $inputs = $request->validated();

        $exist = $this->sendingMethodRepository->findBy("title", $inputs["title"]);
        if (!$exist) {


            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->sendingMethodRepository->create($inputs);
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
        return $this->sendingMethodRepository->getByInput();
    }

}
