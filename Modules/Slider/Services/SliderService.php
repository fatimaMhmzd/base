<?php

namespace Modules\Slider\Services;

use Illuminate\Support\Facades\DB;
use Modules\Polymorphism\Services\ImageService;
use Modules\Slider\Http\Repositories\SliderRepository;
use Modules\Slider\Http\Requests\slider\ValidateSliderRequest;
use Yajra\DataTables\Facades\DataTables;

class SliderService
{
    public function __construct(public SliderRepository $sliderRepository)
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
        $all = $this->sliderRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }
    public function getBy($pageId)
    {
        $filter = [];
        if ($pageId) {
            $filter[] = (object)[
                "col" => "page_id",
                "value" => $pageId,
                "like" => false,
            ];
        }
        $all = $this->sliderRepository->getByInput($filter);
        return $all;
    }

    public function ajax()
    {
        $data = $this->sliderRepository->getByInput();
        return  Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_slider_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_slider_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->addColumn('image', function ($row) {
                $img = '';
                if ($row->image) {
                    $img = '<img src="/' . $row->image->url . '" class="danger w-25"/>';
                }

                return $img;
            })
            ->addColumn('page', function ($row) {
                $page = $row->page->title;


                return $page;
            })
            ->rawColumns(['action', 'image' , 'page'])
            ->make(true);;
    }

    public function find($id)
    {
        return $this->sliderRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->sliderRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->sliderRepository->delete($item);
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

    public function update(ValidateSliderRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->sliderRepository->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->sliderRepository->update($totalUnitItem, $inputs);
                DB::commit();
                $image = $inputs["file"] ?? null;
                if ($image !== null) {

                        $this->uploadImage($totalUnitItemUpdated, $image);
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

    public function store(ValidateSliderRequest $request)
    {
        $inputs = $request->validated();
        $exist = $this->sliderRepository->findBy("title", $inputs["title"]);



            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->sliderRepository->create($inputs);
                DB::commit();
                $image = $inputs["file"] ?? null;
                if ($image !== null) {

                    $this->uploadImage($totalUnitsItem, $image);


                }

            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.store_failed"));
            }

        return $totalUnitsItem;

    }


    public function all()
    {
        return $this->sliderRepository->getByInput();
    }
    public function uploadImage($guild, $file)
    {
        $destinationPath = "public/slider/" . $guild->id;
        ImageService::saveImage(image: $file, model: $guild, is_cover: false, is_public: true, destinationPath: $destinationPath);
    }

}
