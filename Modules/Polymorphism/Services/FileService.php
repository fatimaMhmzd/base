<?php
namespace Modules\Polymorphism\Services;

use App\Exceptions\Contracts\DeveloperException;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileService
{
    use HelpersFileTrait;
    private static function destinationPath($destinationPath = null)
    {
        if (is_null($destinationPath) || !filled($destinationPath)) {
            return config_('configs.files.destination_path_default');
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

    public static function saveFile(
        $file,
        Model $model,
        string $title = null,
        $destinationPath = null
    )
    {
        DB::beginTransaction();
        try {
            if ($file instanceof Request) {
                $file = $file->get('file') ?? null;
            }
            # $input['file'] = time().'.'.$file->getClientOriginalExtension();

            $client_original_extension = self::getClientOriginalExtension($file);
            $original_name_file = self::getClientOriginalName($file);
            $new_name_file = self::setNameFile(file: $file);
            $destinationPath = self::destinationPath($destinationPath);
            $file_url = Storage::putFileAs($destinationPath, $file, $new_name_file);
            if (!$file_url) {
                throw new Exception(___("custom.defaults.upload_failed"));
            }
            $file_url = str_replace('public', 'storage', $file_url);

            # save file model
            $data = [
                'title' => $title ?? null,
                'original_name' => $original_name_file,
                'file' => $new_name_file,
                'type' => $client_original_extension,
                'url' => $file_url,
            ];
            if (method_exists($model, 'file')) {
                $model->file()->create($data);
            }elseif (method_exists($model, 'files')){
                $model->files()->create($data);
            }
            else{
                throw new DeveloperException(message: 'function file or files not set in model');
            }
            DB::commit();
            return true;
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }


    public static function deleteFiles(Model $model)
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
