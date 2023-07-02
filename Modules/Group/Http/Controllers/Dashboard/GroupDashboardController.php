<?php

namespace Modules\Group\Http\Controllers\Dashboard;

use App\Helper\Response\ResponseHelper;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Group\Http\Requests\group\ValidateGroupRequest;
use Modules\Group\Services\GroupService;

class GroupDashboardController extends Controller
{
    public function __construct(public GroupService $service)
    {
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('group::dashboard/list');
    }

    public function ajax()
    {

        $data = $this->service->ajax();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('karzar_destroy', $row->id) . '" class="round"><i class="fa fa-trash danger"></i></a>
<a href="' . route('karzar_edit', $row->id) . '" class="round" ><i class="fa fa-edit success"></i></a>';

                return $btn;
            })
            ->addColumn('user', function ($row) {
                if ($row->user) {
                    $user = $row->user->name;
                } else {
                    $user = '';
                }
                return $user;
            })
            ->addColumn('karzar', function ($row) {
                if ($row->karzar) {
                    $group = $row->karzar->title ;
                } else {
                    $group = '';
                }
                return $group;
            })
            ->addColumn('type', function ($row) {
                if ($row->type) {
                    $type = 'مخالف' ;
                } else {
                    $type = 'موافق';
                }
                return $type;
            })

            ->rawColumns(['action', 'karzar','user','type'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('group::dashboard/add');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ValidateKarzarAcceptedRequest $request)
    {
        try {
            $result = $this->service->store($request);
            $message = trans("custom.defaults.success");
            return back()->with('success', true)->with('message', $message);
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
        return view('karzar::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data = $this->service->find($id);
        if ($data) {
            return view('karzar::karzarAccepted/edit' , compact('data'));

        }


    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ValidateKarzarAcceptedRequest $request, $id)
    {

        try {
            $this->service->update($request, $id);
            $message = trans("custom.defaults.update_success");
            return back()->with('success', true)->with('message', $message);

        }catch (\Exception $exception){
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
        }catch (\Exception $exception){
            $message = $exception->getMessage();
            return back()->with('error', true)->with('message', $message);
        }
    }
}
