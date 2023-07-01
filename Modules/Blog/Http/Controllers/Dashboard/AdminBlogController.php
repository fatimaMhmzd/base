<?php

namespace Modules\Blog\Http\Controllers\Dashboard;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('blog::index');
    }

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
    public function show($id)
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('blog::edit');
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


    public function add()
    {
         return view('blog::dashboard.addBlog');
    }
    public function list()
    {
        return view('blog::dashboard.addBlog');
    }


    /*public function store(Request $request)
    {
        Blog::create([
            'title' => $request->title
        ]);
        return back()->with('success', true)->with('message', 'اطلاعات با موفقیت ذخیره شد');
    }
    public function update($id)
    {
        $data = Blog::find($id);
        return view('blog::dashboard.update', compact('data'));
    }
    public function storeUpdate(Request $request)
    {
        Blog::where('id', $request->id)->update([
            'title' => $request->title
        ]);
        return back()->with('success', true)->with('message', 'اطلاعات با موفقیت ویرایش شد');
    }
    public function delete($id)
    {
        Blog::where('id', $id)->delete();
        return back()->with('success', true)->with('message', 'اطلاعات با موفقیت حذف شد');
    }
    public function ajax()
    {
        $data = Blog::all();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a href="' . route('blog::dashboard.delete', $row->id) . '" class="danger"><i class="fa fa-trash"></i></a>
<a href="' . route('blog::dashboard.update', $row->id) . '" class="success"><i class="fa fa-edit"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }*/
}
