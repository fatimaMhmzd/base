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
