<?php

namespace Modules\Polymorphism\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property integer $id
 * @property string $title
 * @property string $original_name
 * @property string $video
 * @property string $type
 * @property string $url
 * @property integer $created_at
 * @property integer $updated_at
 */
class Video extends Model
{
    protected $table = 'videos_polymorphism';

    protected $fillable = [
        'id',
        'title',
        'original_name',
        'video',
        'type',
        'url',
        'created_at',
        'updated_at',
    ];


    protected $casts = [
        'title' => 'string',
        'original_name' => 'string',
        'video' => 'string',
        'type' => 'string',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public function videoable(): MorphTo
    {
        return $this->morphTo();
    }
}
