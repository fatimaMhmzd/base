<?php

namespace Modules\Blog\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Blog\Http\Repositories\BlogLableRepository;
use Modules\Blog\Http\Repositories\BlogRepository;
use Modules\Blog\Http\Requests\blog\ValidateBlogRequest;
use Yajra\DataTables\Facades\DataTables;

class BlogService
{
    public function __construct(public BlogRepository $blogRepository )
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
        $all = $this->blogRepository->getByInput($filter, $request->perPage, $request->pageNumber);
        return $all;
    }


    public function ajax()
    {
        $data = $this->blogRepository->getByInput();
        return  Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_blog_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_blog_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })


            ->rawColumns(['action'])
            ->make(true);

    }

    public function find($id)
    {
        return $this->blogRepository->find($id);
    }

    public function delete($id)
    {
        $item = $this->blogRepository->find($id);
        if ($item) {
            DB::beginTransaction();
            try {
                $itemDeleted = $this->blogRepository->delete($item);
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

    public function update(ValidateBlogRequest $request, $id): mixed
    {
        $inputs = $request->validated();
        $inputs['updator_user_id']=Auth::id()??null;
        $totalUnitItem = $this->blogRepository->find($id);
        if ($totalUnitItem) {

            DB::beginTransaction();
            try {
                $totalUnitItemUpdated = $this->blogRepository->update($totalUnitItem, $inputs);
                DB::commit();

            } catch (\Exception $exception) {
                DB::rollBack();
                throw new \Exception(trans("custom.defaults.update_failed"));
            }

        } else {
            throw new \Exception(trans("custom.defaults.not_found"));
        }

        return $totalUnitItemUpdated;
    }

    public function store(ValidateBlogRequest $request)
    {
        $inputs = $request->validated();
        $inputs['creator_user_id']=Auth::id()??null;
        $lables = $inputs['lable'] ?? null;

        DB::beginTransaction();
        try {
            $totalUnitsItem = $this->blogRepository->create($inputs);
            if ($lables != null and count($lables) != 0) {
                foreach ($lables as $key => $item){
                    $totalUnitsItem->lables()->save(resolve(LableService::class)->find($item));
                }
            }
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception(trans("custom.defaults.store_failed"));
        }

        return $totalUnitsItem;

    }


    public function all(): \Illuminate\Support\Collection
    {
        return $this->blogRepository->getByInput();
    }


}
