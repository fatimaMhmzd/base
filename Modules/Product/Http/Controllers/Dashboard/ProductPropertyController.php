<?php

namespace Modules\Product\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Color\Services\ColorService;
use Modules\Product\Http\Requests\properties\ValidatePropertiesRequest;
use Modules\Product\Services\ProductGroupService;
use Modules\Product\Services\ProductPropertyService;
use Modules\Unit\Services\UnitService;

class ProductPropertyController extends Controller
{
    public function __construct(public ProductPropertyService $service)
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
    public function create($id)
    {
        $productId = $id;
        $unit= resolve(UnitService::class)->all();
        $color= resolve(ColorService::class)->all();
        return view('product::dashboard.property.add' ,compact('productId', 'unit' , 'color'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ValidatePropertiesRequest $request)
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

    public function ajax($id)
    {
        $data = $this->service->ajax($id);
        return $data;
    }
}
