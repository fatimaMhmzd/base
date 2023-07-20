<?php

namespace Modules\Blog\Http\Controllers\Dashboard;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Http\Requests\blog\ValidateBlogRequest;
use Modules\Blog\Services\BlogGroupService;
use Modules\Blog\Services\BlogService;
use Modules\Blog\Services\LableService;

class BlogController extends Controller
{
    public function __construct(public BlogService $service)
    {
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('blog::dashboard.list');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $group = resolve(BlogGroupService::class)->all();
        $lable = resolve(LableService::class)->all();
        return view('blog::dashboard.add',compact('group' ,'lable'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ValidateBlogRequest $request)
    {
        try {
            $result = $this->service->store($request);

            $message = trans("custom.defaults.store_success");
            return back()->with('success', true)->with('message', $message);
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            return back()->with('error', true)->with('message', $message);
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data = $this->service->find($id);
        $group = resolve(BlogGroupService::class)->all();
        $lable = resolve(LableService::class)->all();

        return view('blog::dashboard.update',compact('data','group' ,'lable'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ValidateBlogRequest $request, $id)
    {
        try {
            $this->service->update($request, $id);
            $message = trans("custom.defaults.update_success");
            return back()->with('success', true)->with('message', $message);

        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            return back()->with('error', true)->with('message', $message);

        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            $this->service->delete($id);
            /* $message = "انجام شد";*/
            $message = trans("custom.defaults.delete_success");
            return back()->with('success', true)->with('message', $message);
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            return back()->with('error', true)->with('message', $message);
        }
    }
    public function ajax()
    {
        $data = $this->service->ajax();
        return $data;
    }
}
