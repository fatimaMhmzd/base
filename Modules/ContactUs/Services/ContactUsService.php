<?php

namespace Modules\ContactUs\Services;

use Illuminate\Support\Facades\DB;
use Modules\ContactUs\Http\Repositories\ContactUsRepository;
use Modules\ContactUs\Http\Requests\contactUs\ValidateContactUsRequest;
use Yajra\DataTables\Facades\DataTables;

class ContactUsService
{
    public function __construct(public ContactUsRepository $contactUsRepository)
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
        $all = $this->contactUsRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $data = $this->contactUsRepository->getByInput();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_contactUs_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_contactUs_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->addColumn('contactUs', function ($row) {
                $contactUs = "";
                if ($row->code != null) {
                    $contactUs = '<div style="contactUs:'.$row->code.';">'.$row->code.'</div>';
                }
                return $contactUs;
            })
            ->rawColumns(['action', 'contactUs'])
            ->make(true);
    }

    public function find($id)
    {
        return $this->contactUsRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->contactUsRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->contactUsRepository->delete($item);
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

    public function update(ValidateContactUsRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->contactUsRepository->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->contactUsRepository->update($totalUnitItem, $inputs);
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

    public function store(ValidatecontactUsRequest $request)
    {
        $inputs = $request->validated();


        $exist = $this->contactUsRepository->findBy("title", $inputs["title"]);
        if (!$exist) {


            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->contactUsRepository->create($inputs);
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
        return $this->contactUsRepository->getByInput();
    }
}
