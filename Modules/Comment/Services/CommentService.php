<?php

namespace Modules\Comment\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentService
{

    public static function saveComment(string $comment,Model $model,$relation=null)
    {
        if($comment && filled($comment)){
            $data = [
                'user_id' => Auth::id(),
                /*'replay_to_comments_id' => $replay_to_comments_id ?? 0,*/
                'replay_to_comments_id' => 0,
                'name' => Auth::user()->username ?? null,
                'email' => Auth::user()->email ?? null,
                'title' =>  null,
                'content' => $comment,
                ];
            if($relation and method_exists($model, $relation)){
                $model->$relation()->create($data);
            }
            elseif (method_exists($model, 'comment')) {
                $model->comment()->create($data);
            }elseif (method_exists($model, 'comments')){
                $model->comments()->create($data);
            }
        }
    }
}
