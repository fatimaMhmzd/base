<?php

namespace Modules\SocialMedia\Http\Controllers\api\v1;

use App\Helper\Response\ResponseHelper;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SocialMedia\Http\Requests\socialMedia\ValidateSocialMediaRequest;
use Modules\SocialMedia\Services\SocialMediaService;

class SocialMediaController extends Controller
{
    public function __construct(public SocialMediaService $service)
    {
    }
    /**
     * @OA\Get(
     *     path="/api/v1/social-media",
     *     tags={"شبکه های اجتماعی"},
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
     *     path="/api/v1/social-media/{id}",
     *     tags={"شبکه های اجتماعی"},
     *      summary="شبکه های اجتماعی",
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
     *     path="/api/v1/social-media/{id}",
     *     tags={"شبکه های اجتماعی"},
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
     *     path="/api/v1/social-media",
     *     tags={"شبکه های اجتماعی"},
     *      summary="افزودن",
     *      description="افزودن",
     *     @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema( required={"title"},
     *                  @OA\Property(property="title", type="string", description="عنوان"),
     *                  @OA\Property(property="sub_title", type="string", description="زیر عنوان"),
     *                  @OA\Property(property="link", type="string", description="لینک"),
     *                  @OA\Property(property="url", type="string", description="آدرس"),
     *                  @OA\Property(property="description", type="string", description="توضیحات"),
     *                  @OA\Property(property="file",type="string", format="binary", description="عکس"),
     *              )
     *          )
     *      ),
     *     @OA\Response(response=200, description="Success", @OA\JsonContent()),
     *     @OA\Response(response=500, description="Internal Server Error", @OA\JsonContent()),
     *
     * )
     */
    public function store(ValidateSocialMediaRequest $request)
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
     *     path="/api/v1/social-media/{id}",
     *     tags={"شبکه های اجتماعی"},
     *      summary="ویرایش ",
     *      description="ویرایش",
     *     @OA\Parameter(name="id",in="path",required=true, @OA\Schema(type="integer"),description="آیدی"),
     *     @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema( required={"title"},
     *                  @OA\Property(property="title", type="string", description="عنوان"),
     *                  @OA\Property(property="sub_title", type="string", description="زیر عنوان"),
     *                  @OA\Property(property="link", type="string", description="لینک"),
     *                  @OA\Property(property="url", type="string", description="آدرس"),
     *                  @OA\Property(property="description", type="string", description="توضیحات"),
     *                  @OA\Property(property="file",type="string", format="binary", description="عکس"),
     *              )
     *          )
     *      ),
     *     @OA\Response(response=200, description="Success", @OA\JsonContent()),
     *     @OA\Response(response=500, description="Internal Server Error", @OA\JsonContent()),
     *
     * )
     */
    public function update(ValidateSocialMediaRequest $request, $id)
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
