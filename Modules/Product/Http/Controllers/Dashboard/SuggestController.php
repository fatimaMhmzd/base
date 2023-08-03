<?php

namespace Modules\Product\Http\Controllers\Dashboard;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Http\Requests\suggest\ValidateSuggestRequest;
use Modules\Product\Services\SuggestService;

class SuggestController extends Controller
{
    public function __construct(public SuggestService $service)
    {
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('product::dashboard.suggest.list');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
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
        return view('product::dashboard.suggest.update',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ValidateSuggestRequest $request, $id)
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
        //
    }
    public function ajax()
    {
        $all = $this->service->ajax();
        return $all;
    }
}
