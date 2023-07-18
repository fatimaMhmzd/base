<?php

namespace Modules\Product\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Color\Services\ColorService;
use Modules\Product\Http\Requests\product\ValidateProductRequest;
use Modules\Product\Services\ProductGroupService;
use Modules\Product\Services\ProductService;
use Modules\Size\Entities\Size;
use Modules\Size\Services\SizeService;
use Modules\Unit\Services\UnitService;
use Yajra\DataTables\Facades\DataTables;

class ProductDashboardController extends Controller
{
    public function __construct(public ProductService $service)
    {
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('product::dashboard.product.list');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $group = resolve(ProductGroupService::class)->all();
        return view('product::dashboard.product.add', compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ValidateProductRequest $request)
    {


        try {
            $result = $this->service->store($request);
            return $result;

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
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data = $this->service->find($id);
        $group = resolve(ProductGroupService::class)->all();
        return view('product::dashboard.product.update',compact('data' ,'group'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ValidateProductRequest $request, $id)
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
