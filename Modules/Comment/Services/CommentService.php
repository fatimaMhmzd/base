<?php

namespace Modules\Comment\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentService
{
    const default_display = false;
    const default_pin = false;
    const default_status = 0;
    public static function saveComment(
        $comment,
        Model $model,
        $replay_to_comments_id = 0,
        string $name = null,
        string $email = null,
        string $title = null,
        bool $display = self::default_display,
        bool $pin = self::default_pin,
         $status = self::default_status,
        $relation =null

    )
    {
        DB::beginTransaction();
        try {


            $data = array(
                'user_id' => Auth::id() ?? null,
                'replay_to_comments_id' => $replay_to_comments_id,
                'name' => $name ?? Auth::user()->username,
                'email' => $email ?? Auth::user()->email,
                'title' => $title ?? null,
                'content' => $comment,
                'display' => $display,
                'pin' => $pin,
                'status' => $status,
            );
            if ($relation && method_exists($model, $relation)) {
                $model->$relation()->create($data);
            } elseif (method_exists($model, 'comment')) {
                $model->comment()->create($data);
            } elseif (method_exists($model, 'comments')) {
                $model->comments()->create($data);
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
}
