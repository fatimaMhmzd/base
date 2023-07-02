<?php

namespace Modules\Polymorphism\Services;


use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

function randomString($length = 10, $start_with = '', $end_with = '')
{

    $start_with = filled($start_with) ? $start_with . "_" : $start_with;
    $end_with = filled($end_with) ? "_" . $end_with : $end_with;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $start_with . $randomString . $end_with;
}

class ImageService
{
    use HelpersFileTrait;

    const default_is_cover = false;
    const default_is_public = false;
    const default_is_water_mark = false;

    # main function
    public static function saveImage(
        $image,
        Model $model,
        string $title = null,
        bool $is_cover = self::default_is_cover,
        bool $is_public = self::default_is_public,
        bool $is_water_mark = self::default_is_water_mark,
        $destinationPath = null,
        $relation = null
    )
    {
        DB::beginTransaction();
        try {
            if ($image instanceof Request) {
                $image = $image?->get('image') ?? $image?->get('file') ?? null;
            }

            $client_original_extension = self::getClientOriginalExtension($image);
            $original_name_image = self::getClientOriginalName($image);
            $new_name_image = self::setNameFile(file: $image);
            $destinationPath = self::destinationPath($destinationPath);
            $image_url = Storage::putFileAs($destinationPath, $image, $new_name_image);

            if (!$image_url) {
                throw new Exception(trans("custom.defaults.upload_failed"));
            }
            $image_url = str_replace('public', 'storage', $image_url);
            # save image model
            $data = [
                'title' => $title ?? null,
                'original_name' => $original_name_image,
                'image' => $new_name_image,
                'type' => $client_original_extension,
                'url' => $image_url,
                'is_cover' => $is_cover,
                'is_public' => $is_public,
                'is_water_mark' => $is_water_mark,
            ];
            if ($relation && method_exists($model, $relation)) {
                $model->$relation()->create($data);
            } elseif (method_exists($model, 'image')) {
                $model->image()->create($data);
            } elseif (method_exists($model, 'images')) {
                $model->images()->create($data);
            } else {
                throw new DeveloperException(message: 'function image or images not set in model');
            }
            DB::commit();
            return true;
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    private static function destinationPath($destinationPath = null)
    {
        if (is_null($destinationPath) || !filled($destinationPath)) {
            return config_('configs.images.destination_path_default');
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
        return randomString(length: $length, start_with: $start_with, end_with: $end_with);
    }






    public static function deleteImages(Model $model)
    {
        try {
            if (method_exists($model, 'images')) {
                $links = $model->images->pluck('url');
                self::helperDeleteFiles($links);
            } elseif (method_exists($model, 'image')) {
                $link = $model->image->pluck('url');
                self::helperDeleteFiles($link);
            }
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
