<?php

namespace Modules\Comment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments_polymorphism';

    protected $fillable = [
        'id',
        'user_id',
        'replay_to_comments_id',
        'name',
        'email',
        'title',
        'content',
        'display',
        'pin',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $hidden=[
//        'id',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'replay_to_comments_id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'title' => 'string',
        'content' => 'string',
        'display' => 'string',
        'pin' => 'boolean',
        'status' => 'integer',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

}
