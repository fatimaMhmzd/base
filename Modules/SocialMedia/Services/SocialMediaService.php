<?php

namespace Modules\SocialMedia\Services;

use Illuminate\Support\Facades\DB;
use Modules\Polymorphism\Services\ImageService;
use Modules\SocialMedia\Http\Repositories\SocialMediaRepository;
use Modules\SocialMedia\Http\Requests\socialMedia\ValidateSocialMediaRequest;
use Yajra\DataTables\Facades\DataTables;

class SocialMediaService
{
    public function __construct(public SocialMediaRepository $socialMediaRepository)
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
        $all = $this->socialMediaRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $data = $this->socialMediaRepository->getByInput();
        return  Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_social_media_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_social_media_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

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
        return $this->socialMediaRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->socialMediaRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->socialMediaRepository->delete($item);
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

    public function update(ValidateSocialMediaRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->socialMediaRepository->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->socialMediaRepository->update($totalUnitItem, $inputs);
                DB::commit();
                $image = $inputs["file"] ?? null;
                if ($image !== null) {

                        $this->uploadImage($totalUnitItem, $image);


                }
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.update_failed"));
            }

        } else {
            throw new \Exception(trans("custom.defaults.not_found"));
        }

        return $totalUnitItemUpdated;
    }

    public function store(ValidateSocialMediaRequest $request)
    {
        $inputs = $request->validated();
        $exist = $this->socialMediaRepository->findBy("title", $inputs["title"]);
        if (!$exist) {



            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->socialMediaRepository->create($inputs);
                DB::commit();
                $image = $inputs["file"] ?? null;
                if ($image !== null) {

                        $this->uploadImage($totalUnitsItem, $image);


                }
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.store_failed"));
            }
        } else {
            throw new \Exception(trans("custom.publicContent.item_with_application_id_already_exist"));
        }


        return $totalUnitsItem;

    }


    public function all()
    {
        return $this->socialMediaRepository->getByInput();
    }
    public function uploadImage($guild, $file)
    {
        $destinationPath = "public/socialMedia/" . $guild->id;
        ImageService::saveImage(image: $file, model: $guild, is_cover: false, is_public: true, destinationPath: $destinationPath);
    }
}
