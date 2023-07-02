<?php

namespace Modules\Polymorphism\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property integer $id
 * @property string $title
 * @property string $original_name
 * @property string $image
 * @property string $type
 * @property string $url
 * @property string $is_cover
 * @property string $is_public
 * @property string $is_water_mark
 * @property integer $created_at
 * @property integer $updated_at
 */
class Images extends Model
{
    use HasFactory;
    protected $table = 'images_polymorphism';

    protected $fillable = [
        'id',
        'title',
        'original_name',
        'image',
        'type',
        'url',
        'is_cover',
        'is_public',
        'is_water_mark',
        'created_at',
        'updated_at',
    ];

    protected $hidden=[
//        'id',
    ];

    protected $casts = [
        'title' => 'string',
        'original_name' => 'string',
        'image' => 'string',
        'type' => 'string',
        'url' => 'string',
        'is_cover' => 'boolean',
        'is_public' => 'boolean',
        'is_water_mark' => 'boolean',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }

}
