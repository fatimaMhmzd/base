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

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = $this->service->shopIndexPage();
        return view('product::client.store',compact('data'));
    }

}
