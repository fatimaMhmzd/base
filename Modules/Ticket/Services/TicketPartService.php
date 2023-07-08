<?php

namespace Modules\Ticket\Services;

use Illuminate\Support\Facades\DB;
use Modules\Ticket\Http\Repositories\TicketPartRepository;
use Modules\Ticket\Http\Requests\TicketPart\ValidateTicketPartRequest;

class TicketPartService
{
    public function __construct(public TicketPartRepository $ticketPartRepository)
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
        $all = $this->ticketPartRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $all = $this->ticketPartRepository->getByInput();
        return $all;
    }

    public function find($id)
    {
        return $this->ticketPartRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->ticketPartRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->ticketPartRepository->delete($item);
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

    public function update(ValidateTicketPartRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->ticketPartRepository->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->ticketPartRepository->update($totalUnitItem, $inputs);
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

    public function store(ValidateTicketPartRequest $request)
    {
        $inputs = $request->validated();
        $exist = $this->ticketPartRepository->findBy("title", $inputs["title"]);
        if (!$exist) {



            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->ticketPartRepository->create($inputs);
                DB::commit();
                return $totalUnitsItem;
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.store_failed"));
            }
        } else {
            throw new \Exception(trans("custom.publicContent.item_with_application_id_already_exist"));
        }

        $image = $inputs["file"] ?? null;
        if ($image !== null) {
            foreach ($image as $item){
                $this->uploadImage($totalUnitsItem, $item);
            }

        }
        return $totalUnitsItem;

    }


    public function all()
    {
        return $this->ticketPartRepository->getByInput();
    }


}
