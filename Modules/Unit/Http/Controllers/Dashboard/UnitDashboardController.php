<?php

namespace Modules\Unit\Http\Controllers\Dashboard;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Unit\Http\Requests\unit\ValidateUnitRequest;
use Modules\Unit\Services\UnitService;
use Yajra\DataTables\Facades\DataTables;

class UnitDashboardController extends Controller
{
    public function __construct(public UnitService $service)
    {
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('unit::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('unit::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ValidateUnitRequest $request)
    {
        try {
            $result = $this->service->store($request);
            return back()->with('success', true)->with('message',$result);
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
        return view('unit::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('unit::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ValidateUnitRequest $request, $id)
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
