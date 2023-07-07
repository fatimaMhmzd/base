<?php

namespace Modules\Ticket\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Ticket\Http\Repositories\TicketBodyRepository;
use Modules\Ticket\Http\Repositories\TicketRepository;
use Modules\Ticket\Http\Requests\Ticket\ValidateTicketRequest;

class TicketService
{
    public function __construct(public TicketRepository $ticketRepository , public TicketBodyRepository $ticketBodyRepository)
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
        $all = $this->ticketRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $all = $this->ticketRepository->getByInput();
        return $all;
    }

    public function find($id)
    {
        return $this->ticketRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->ticketRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->ticketRepository->delete($item);
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

    public function update(ValidateTicketRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->ticketRepository->find($id);

        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->ticketRepository->update($totalUnitItem, $inputs);
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

    public function store(ValidateTicketRequest $request)
    {
        $inputs = $request->validated();
        $inputs["userId"] = Auth::id();
        $body = $inputs["body"] ?? null;
        if ($body){

        DB::beginTransaction();
        try {
            $crateTicket = $this->ticketRepository->create($inputs);
            $ticketBodyService = resolve(TicketBodyService::class);
            $totalUnitsItem = $ticketBodyService->store(["creatorId" => $inputs["userId"],"ticketId" => $crateTicket->id,"body" => $inputs["body"] , "status" => 0 ]);
            DB::commit();
            return $totalUnitsItem;
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception(trans("custom.defaults.store_failed"));
        }
        }




    }


    public function all()
    {
        return $this->ticketRepository->getByInput(relations:["user","tickets"]);
    }


}
