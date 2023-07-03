<?php

namespace Modules\Slider\Http\Controllers\Dashboard;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Page\Services\PageService;
use Modules\Slider\Http\Requests\slider\ValidateSliderRequest;
use Modules\Slider\Services\SliderService;
use Yajra\DataTables\Facades\DataTables;

class SliderDashboardController extends Controller
{
    public function __construct(public SliderService $service)
    {
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('slider::dashboard.list');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        $allPage = resolve(PageService::class)->all();
        return view('slider::dashboard.add' , compact('allPage'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ValidateSliderRequest $request)
    {

        try {
            $result = $this->service->store($request);
            return back()->with('success', true)->with('message', 'با موفقیت انجام شد.');
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
        return view('slider::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data = $this->service->find($id);
        $allPage = resolve(PageService::class)->all();
        return view('slider::dashboard.update',compact('data','allPage'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ValidateSliderRequest $request, $id)
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
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('dashboard_slider_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
 <a href="' . route('dashboard_slider_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->addColumn('image', function ($row) {
                $img = '';
                if ($row->image) {
                    $img = '<img src="' . $row->image->url . '" class="danger w-25"/>';
                }

                return $img;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }
}
