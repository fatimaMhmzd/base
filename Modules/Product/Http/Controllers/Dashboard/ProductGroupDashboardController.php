<?php

namespace Modules\Product\Http\Controllers\Dashboard;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Http\Requests\productGroup\ValidateProductGroupRequest;
use Modules\Product\Services\ProductGroupService;

class ProductGroupDashboardController extends Controller
{
    public function __construct(public ProductGroupService $service)
    {
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('product::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $all = $this->service->subGroup(0);
        return view('product::dashboard.group.add', compact('all'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ValidateProductGroupRequest $request)
    {
        try {
            $result = $this->service->store($request);
            return back()->with('success', true)->with('message', 'با موفقیت انجام شد.');
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
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('product::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function getSubGroup($id)
    {

        $all = $this->service->subGroup($id);

       return $all;


    }

}
