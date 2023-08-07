<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Services\BlogGroupService;
use Modules\Blog\Services\BlogService;

class BlogController extends Controller
{
    public function __construct(public BlogService $service)
    {
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blog::create');
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
    public function show($slug)
    {
        $data = $this->service->blogDetail($slug);
        return view('blog::client.blogDetail',compact('data'));

    }



}
