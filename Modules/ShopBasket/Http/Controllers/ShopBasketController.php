<?php

namespace Modules\ShopBasket\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Modules\Address\Http\Requests\address\ValidateAddressRequest;
use Modules\ShopBasket\Services\OrderService;
use Modules\ShopBasket\Services\SendingMethodService;

class ShopBasketController extends Controller
{
    public function __construct(public OrderService $service)
    {
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('shopbasket::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('shopbasket::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ValidateAddressRequest $request)
    {
        try {
            $result = $this->service->finalfactor($request);
            $message = trans("custom.defaults.store_success");
            return Redirect::route('indexClient');
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
    public function show()
    {
        $cart = $this->service->index()->first();
        $sendingMethod = resolve(SendingMethodService::class)->all();
        return view('shopbasket::client.cart', compact('cart','sendingMethod'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('shopbasket::edit');
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
}
