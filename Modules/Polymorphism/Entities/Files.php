<?php

namespace Modules\Polymorphism\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;


/**
 * @property integer $id
 * @property string $title
 * @property string $original_name
 * @property string $file
 * @property string $type
 * @property string $url
 * @property integer $created_at
 * @property integer $updated_at
 */
class Files extends Model
{
    protected $table = 'files_polymorphism';

    protected $fillable = [
        'id',
        'title',
        'original_name',
        'file',
        'type',
        'url',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
//        'id',
    ];

    protected $casts = [
        'title' => 'string',
        'original_name' => 'string',
        'file' => 'string',
        'type' => 'string',
        'url' => 'string',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public function fileable(): MorphTo
    {
        return $this->morphTo();
    }
}
