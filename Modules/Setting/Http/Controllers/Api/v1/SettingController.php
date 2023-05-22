<?php

namespace Modules\Setting\Http\Controllers\Api\v1;

use App\Helper\Response\ResponseHelper;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setting\Http\Requests\setting\ValidateSettingRequest;
use Modules\Setting\Services\SettingService;

class SettingController extends Controller
{
    public function __construct(public SettingService $service)
    {
    }
    /**
     * @OA\Get(
     *     path="/api/v1/setting",
     *     tags={"تنظیمات"},
     *      summary="لیست",
     *      description="جست جو و نمایش لیست گروه ها",
     *      @OA\Parameter(
     *         name="title",
     *         in="query",
     *         description="متن جستجو شده",
     *         required=false,
     *      ),
     *     @OA\Response(response=200, description="Success", @OA\JsonContent()),
     *     @OA\Response(response=500, description="Internal Server Error", @OA\JsonContent()),
     *
     * )
     */
    public function index(Request $request)
    {


        $result = $this->service->index($request);

        $data = ["data" => $result];


        return ResponseHelper::responseSuccess($data);
    }
    /**
     * @OA\Get(
     *     path="/api/v1/setting/{id}",
     *     tags={"تنظیمات"},
     *      summary="تنظیمات",
     *      description="جست جو گروه ها",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ایدی",
     *         required=true,
     *      ),
     *     @OA\Response(response=200, description="Success", @OA\JsonContent()),
     *     @OA\Response(response=500, description="Internal Server Error", @OA\JsonContent()),
     *
     * )
     */
    public function find($id)
    {
        $data = $this->service->find($id);
        if ($data) {
            return ResponseHelper::responseSuccess($data);
        }
        $message = trans("custom.defaults.not_found");
        return ResponseHelper::responseCustomError($message);
    }
    /**
     * @OA\Delete(
     *     path="/api/v1/setting/{id}",
     *     tags={"تنظیمات"},
     *      summary="حذف",
     *      description="حذف",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ایدی",
     *         required=true,
     *      ),
     *     @OA\Response(response=200, description="Success", @OA\JsonContent()),
     *     @OA\Response(response=500, description="Internal Server Error", @OA\JsonContent()),
     *
     * )
     */
    public function delete($id)
    {
        try {
            $this->service->delete($id);
            /* $message = "انجام شد";*/
            $message = trans("custom.defaults.delete_success");
            return ResponseHelper::responseSuccess([],[],$message);
        }catch (\Exception $exception){
            $message = $exception->getMessage();
            return ResponseHelper::responseCustomError($message);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/v1/setting",
     *     tags={"تنظیمات"},
     *      summary="افزودن",
     *      description="افزودن",
     *     @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(required={"key","value"},
     *                  @OA\Property(property="key", type="string", description="عنوان"),
     *                  @OA\Property(property="value", type="string", description="مقدار"),
     *                  @OA\Property(property="file",type="string", format="binary", description="عکس"),
     *              )
     *          )
     *      ),
     *     @OA\Response(response=200, description="Success", @OA\JsonContent()),
     *     @OA\Response(response=500, description="Internal Server Error", @OA\JsonContent()),
     *
     * )
     */
    public function store(ValidateSettingRequest $request)
    {

        try {
            $result = $this->service->store($request);
            return ResponseHelper::responseSuccess($result);
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            return ResponseHelper::responseCustomError($message);
        }

    }
    /**
     * @OA\Post (
     *     path="/api/v1/setting/{id}",
     *     tags={"تنظیمات"},
     *      summary="ویرایش ",
     *      description="ویرایش",
     *     @OA\Parameter(name="id",in="path",required=true, @OA\Schema(type="integer"),description="آیدی"),
     *     @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema( required={"key","value"},
     *                  @OA\Property(property="key", type="string", description="عنوان"),
     *                  @OA\Property(property="value", type="string", description="مقدار"),
     *                  @OA\Property(property="file",type="string", format="binary", description="عکس"),
     *              )
     *          )
     *      ),
     *     @OA\Response(response=200, description="Success", @OA\JsonContent()),
     *     @OA\Response(response=500, description="Internal Server Error", @OA\JsonContent()),
     *
     * )
     */
    public function update(ValidateSettingRequest $request, $id)
    {

        try {
            $this->service->update($request, $id);
            $message = trans("custom.defaults.update_success");
            return ResponseHelper::responseSuccess($message);
        }catch (\Exception $exception){
            $message = $exception->getMessage();
            return ResponseHelper::responseCustomError($message);
        }
    }
}
