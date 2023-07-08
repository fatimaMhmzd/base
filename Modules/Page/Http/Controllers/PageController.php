<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Page\Services\PageService;

class PageController extends Controller
{

    public function __construct(public PageService $service)
    {
    }

    public function index()
    {
        $indexPageData = $this->service->indexPageData();
        return view('page::client.publicc.home.home',compact('indexPageData'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('page::create');
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
        return view('page::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('page::edit');
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

//    COMPARE PAGE
    public function compare()
    {
        return view('page::client.compare.compare');
    }

    //    WISHLIST PAGE
    public function wishlist()
    {
        return view('page::client.wishlist.wishlist');
    }

//    ABOUT PAGE
    public function about()
    {
        return view('page::client.publicc.about.about');
    }

//    CONTACT PAGE
    public function contact()
    {
        return view('page::client.publicc.contact.contact');
    }

}
