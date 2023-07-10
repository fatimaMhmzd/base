<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Product\Services\ProductService;

class ProductController extends Controller
{

    public function __construct(public ProductService $service)
    {
    }

    public function index()
    {
        $data = $this->service->shopIndexPage();
        return view('product::client.store',compact('data'));
    }

    public function productDetail($slug)
    {
        $data = $this->service->productDetail($slug);
//        return $data;
        return view('product::client.productDetail',compact('data'));
    }

    public function cart()
    {
        return view('product::client.cart');
    }
    public function checkout()
    {
        return view('product::client.checkout');
    }
}
