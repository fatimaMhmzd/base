<?php

namespace Modules\Page\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Page\Http\Repositories\PageRepository;
use Modules\Page\Http\Requests\page\ValidatePageRequest;
use Modules\Polymorphism\Services\ImageService;
use Modules\Product\Entities\Suggest;
use Modules\Product\Http\Repositories\SuggestRepository;
use Modules\Product\Services\ProductService;
use Modules\Product\Services\SuggestService;
use Modules\Product\Services\WishListService;
use Modules\Slider\Http\Repositories\SliderRepository;
use Modules\SocialMedia\Services\SocialMediaService;
use Yajra\DataTables\Facades\DataTables;

class PageService
{
    public function __construct(public PageRepository $pageRepository)
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

        $all = $this->pageRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }

    public function ajax()
    {
        $data = $this->pageRepository->getByInput();
        return  Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_page_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_page_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);

    }

    public function find($id)
    {
        return $this->pageRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->pageRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->pageRepository->delete($item);
                $sliderRepository = new SliderRepository();
                $sliderRepository->by(null,'page_id',$id)->delete();
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

    public function update(ValidatePageRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $totalUnitItem = $this->pageRepository->find($id);
        if ($totalUnitItem) {
            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->pageRepository->update($totalUnitItem, $inputs);
                DB::commit();
                $image = $inputs["file"] ?? null;
                if ($image !== null) {

                    $this->uploadImage($totalUnitItem, $image);


                }
                return $totalUnitItem;
            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.update_failed"));
            }

        } else {
            throw new \Exception(trans("custom.defaults.not_found"));
        }

    }

    public function store(ValidatePageRequest $request)
    {
        $inputs = $request->validated();

        $exist = $this->pageRepository->findBy("title", $inputs["title"]);

        if (!$exist) {
            DB::beginTransaction();
            try {
                $totalUnitsItem = $this->pageRepository->create($inputs);
                DB::commit();
                $image = $inputs["file"] ?? null;
                if ($image !== null) {

                    $this->uploadImage($totalUnitsItem, $image);


                }
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
        return $this->pageRepository->getByInput();
    }
    public function uploadImage($guild, $file)
    {
        $destinationPath = "public/page/" . $guild->id;
        ImageService::saveImage(image: $file, model: $guild, is_cover: false, is_public: true, destinationPath: $destinationPath);
    }

    public function indexPageData(): object
    {
        $allSocialMedia = resolve(SocialMediaService::class)->all();
        $bestProduct = resolve(ProductService::class)->all();
        $mostSell = resolve(ProductService::class)->all();
        $highestRate = resolve(ProductService::class)->all();
        $suggestRepository = resolve(SuggestRepository::class);
        $suggests = $suggestRepository->all(relations:['product']);

        return (object)array("allSocialMedia"=>$allSocialMedia,"bestProduct"=>$bestProduct,"mostSell"=>$mostSell,"highestRate"=>$highestRate ,"suggests"=>$suggests);
    }

    public function cartItems($request)
    {

        $data = resolve(WishListService::class)->index($request);
        return $data;
    }
}
