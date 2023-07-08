<?php

namespace Modules\Ticket\Services;

use Illuminate\Support\Facades\DB;
use Modules\Polymorphism\Services\ImageService;
use Modules\SocialMedia\Http\Repositories\SocialMediaRepository;
use Modules\SocialMedia\Http\Requests\socialMedia\ValidateSocialMediaRequest;
use Modules\Ticket\Http\Repositories\TicketBodyRepository;
use Modules\Ticket\Http\Requests\TicketBody\ValidateTicketBodyRequest;

class TicketBodyService
{
    public function __construct(public TicketBodyRepository $ticketBodyRepository)
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
        $all = $this->ticketBodyRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $all = $this->ticketBodyRepository->getByInput();
        return $all;
    }

    public function find($id)
    {
        return $this->ticketBodyRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->ticketBodyRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->ticketBodyRepository->delete($item);
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

    public function update(ValidateTicketBodyRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->ticketBodyRepository->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->ticketBodyRepository->update($totalUnitItem, $inputs);
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

    public function store(ValidateTicketBodyRequest $request)
    {
        $inputs = $request->validated();
        $exist = $this->ticketBodyRepository->findBy("title", $inputs["title"]);
        if (!$exist) {



            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->ticketBodyRepository->create($inputs);
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
        return $this->ticketBodyRepository->getByInput();
    }


}
