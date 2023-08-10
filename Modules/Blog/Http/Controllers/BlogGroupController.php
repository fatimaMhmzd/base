<?php

namespace Modules\Blog\Http\Controllers;

use Hekmatinasser\Verta\Verta;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\BlogGroup;
use Modules\Blog\Services\BlogGroupService;

class BlogGroupController extends Controller
{
    public function __construct(public BlogGroupService $service)
    {
    }

    public function list(Request $request)
    {
        $data = $this->service->listBlog($request);
        return view('blog::client.listBlog', compact('data'));
    }

}
