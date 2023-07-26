<?php

namespace Modules\Polymorphism\Services;

use App\Exceptions\Contracts\DeveloperException;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VideoService
{
    use HelpersFileTrait;
    /**
     * Handles the file upload
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws UploadMissingFileException
     * @throws \Pion\Laravel\ChunkUpload\Exceptions\UploadFailedException
     */
    public function upload(Request $request)
    {
        // create the file receiver
        $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));
        // check if the upload is success, throw exception or return response you need
        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }
        // receive the file
        $save = $receiver->receive();
        // check if the upload has finished (in chunk mode it will send smaller files)
        if ($save->isFinished()) {
            // save the file and return any response you need, current example uses `move` function. If you are
            // not using move, you need to manually delete the file by unlink($save->getFile()->getPathname())
            return $this->saveFile($save->getFile(), $request);
        }
        // we are in chunk mode, lets send the current progress
        /** @var AbstractHandler $handler */
        $handler = $save->handler();
        return response()->json([
            "done" => $handler->getPercentageDone(),
            'status' => true
        ]);
    }

    /**
     * Saves the file to S3 server
     *
     * @param UploadedFile $file
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function saveFileToS3($file)
    {
        $fileName = $this->createFilename($file);
        $disk = Storage::disk('s3');
        // It's better to use streaming Streaming (laravel 5.4+)
        $disk->putFileAs('photos', $file, $fileName);
        // for older laravel
        // $disk->put($fileName, file_get_contents($file), 'public');
        $mime = str_replace('/', '-', $file->getMimeType());
        // We need to delete the file when uploaded to s3
        unlink($file->getPathname());
        return response()->json([
            'path' => $disk->url($fileName),
            'name' => $fileName,
            'mime_type' => $mime
        ]);
    }

    /**
     * Saves the file
     *
     * @param UploadedFile $file
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function saveFile(UploadedFile $file, $request)
    {
        $fileName = $this->createFilename($file);
        // Group files by mime type
        $mime = str_replace('/', '-', $file->getMimeType());
        $dateFolder = date("Y-m-W");
        $filePath = "upload/{$mime}/{$dateFolder}/";
        $finalPath = public_path("app/" . $filePath);
        $file->move($finalPath, $fileName);
        $data = [
            'title' => $request->titlee ?? null,
            'original_name' => $filePath,
            'video' => $filePath,
            'type' => $mime,
            'url' => "app/" . $filePath,
        ];

     /*   EducationProductItem::create([
            'product_id' => $request->productId,
            'titlee' => $request->titlee,
            'description' => $request->description,
            'netType' => $request->netType,
            'url' => "app/" . $filePath,
            'title' => $fileName,
            'type' => $mime,
            'preview' => '0',
        ]);*/

        return response()->json([
            'path' => $filePath,
            'name' => $fileName,
            'mime_type' => $mime
        ]);
    }

    /**
     * Create unique filename for uploaded file
     * @param UploadedFile $file
     * @return string
     */
    protected function createFilename(UploadedFile $file)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = str_replace("." . $extension, "", $file->getClientOriginalName()); // Filename without extension
        // Add timestamp hash to name of the file
        $filename .= "_" . md5(time()) . "." . $extension;
        return $filename;
    }


    public function deleteUpload($id)
    {
        $uploadData = EducationProductItem::find($id);
        $fileAddres = $uploadData->url . $uploadData->title;
        if (File::exists($fileAddres)) {
            File::delete($fileAddres);
            $uploadData->delete();
        }
        return back()->with('success', true)->with('message', 'درخواست شما با موفقیت ثبت شد');
    }

    /*updated*/

    private static function destinationPath($destinationPath = null)
    {
        if (is_null($destinationPath) || !filled($destinationPath)) {
            return config_('configs.videos.destination_path_default');
        }
        return $destinationPath;
    }

    private static function getClientOriginalName($file)
    {
        return $file?->getClientOriginalName() ?? null;
    }

    private static function getClientOriginalExtension($file)
    {
        return $file?->getClientOriginalExtension() ?? null;
    }

    private static function setNameFile($file, $type = null, $length = 2, $start_with = null, $end_with = null): string
    {
        $start_with = $start_with ?? $type;
        $end_with = $end_with ?? time();
        $end_with = $end_with . "." . ($file?->getClientOriginalExtension() ?? '');
        return random_string(length: $length, start_with: $start_with, end_with: $end_with);
    }

    public static function saveVideo(
        $video,
        Model $model,
        string $title = null,
        $destinationPath = null
    )
    {
        DB::beginTransaction();
        try {
            if ($video instanceof Request) {
                $video = $video->get('video') ?? $video->get('file') ?? null;
            }
            # $input['file'] = time().'.'.$video->getClientOriginalExtension();

            $client_original_extension = self::getClientOriginalExtension($video);
            $original_name_video = self::getClientOriginalName($video);
            $new_name_video = self::setNameFile(file: $video);
            $destinationPath = self::destinationPath($destinationPath);
            $video_url = Storage::putFileAs($destinationPath, $video, $new_name_video);
            if (!$video_url) {
                throw new Exception(___("custom.defaults.upload_failed"));
            }
            $video_url = str_replace('public', 'storage', $video_url);

            # save video model
            $data = [
                'title' => $title ?? null,
                'original_name' => $original_name_video,
                'video' => $new_name_video,
                'type' => $client_original_extension,
                'url' => $video_url,
            ];
            if (method_exists($model, 'video')) {
                $model->video()->create($data);
            }elseif (method_exists($model, 'videos')){
                $model->videos()->create($data);
            }
            else{
                throw new DeveloperException(message: 'function video or videos not set in model');
            }
            DB::commit();
            return true;
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public static function deleteVideos(Model $model)
    {
        try {
            if(method_exists($model,'files')){
                $links = $model->files->pluck('url');
                self::helperDeleteFiles($links);
            }elseif(method_exists($model,'file')){
                $link = $model->file->pluck('url');
                self::helperDeleteFiles($link);
            }
        }
        catch (Exception $exception){
            throw $exception;
        }
    }

}
