<?php

namespace Modules\ShopBasket\Services;

use Illuminate\Support\Facades\DB;
use Modules\ShopBasket\Http\Repositories\PaymentMethodRepository;
use Modules\ShopBasket\Http\Requests\paymentMethod\ValidatePaymentMethodRequest;
use Yajra\DataTables\Facades\DataTables;

class PaymentMethodService
{
    public function __construct(public PaymentMethodRepository $paymentMethodRepository)
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
        $all = $this->paymentMethodRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $data = $this->paymentMethodRepository->getByInput();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_shop_basket_payment_method_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_shop_basket_payment_method_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function find($id)
    {
        return $this->paymentMethodRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->paymentMethodRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->paymentMethodRepository->delete($item);
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

    public function update(ValidatePaymentMethodRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->paymentMethodRepository->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->paymentMethodRepository->update($totalUnitItem, $inputs);
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

    public function store(ValidatePaymentMethodRequest $request)
    {
        $inputs = $request->validated();

        $exist = $this->paymentMethodRepository->findBy("title", $inputs["title"]);
        if (!$exist) {


            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->paymentMethodRepository->create($inputs);
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
        return $this->paymentMethodRepository->getByInput();
    }

}
