<?php

namespace Modules\Group\Http\Controllers;

use App\Helper\Response\ResponseHelper;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Group\Http\Requests\group\ValidateGroupRequest;
use Modules\Group\Services\GroupService;


class GroupController extends Controller
{
    public function __construct(public GroupService $service)
    {
    }



    public function index(Request $request)
    {
        $result = $this->service->index($request);
        $data = ["data" => $result];
        return ResponseHelper::responseSuccess($data);
    }


    public function find($id)
    {
        $data = $this->service->find($id);
        if ($data) {
            return ResponseHelper::responseSuccess($data);
        }
        $message = trans("custom.defaults.not_found");
        return ResponseHelper::responseCustomError($message);
    }


    public function delete($id)
    {
        try {
            $this->service->delete($id);
            $message = trans("custom.defaults.delete_success");
            return ResponseHelper::responseSuccess([],[],$message);
        }catch (\Exception $exception){
            $message = $exception->getMessage();
            return ResponseHelper::responseCustomError($message);
        }
    }


    public function store(ValidateGroupRequest $request)
    {
        try {
            $result = $this->service->store($request);
            return ResponseHelper::responseSuccess($result);
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            return ResponseHelper::responseCustomError($message);
        }
    }


    public function update(ValidateGroupRequest $request, $id)
    {
        try {
            $this->service->update($request, $id);
            $message = trans("custom.defaults.update_success");
            return $this->response_success([], $message);
        }catch (\Exception $exception){
            $message = $exception->getMessage();
            return ResponseHelper::responseCustomError($message);
        }
    }

}
