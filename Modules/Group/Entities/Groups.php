<?php

namespace Modules\Group\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Polymorphism\Entities\Images;


/**
 * @property integer $id
 * @property string $title
 * @property string $sub_title
 * @property string $description
 * @property integer $father_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Groups extends Model
{
    protected $table = 'groups_polymorphism';

    protected $fillable = [
        'id',
        'title',
        'sub_title',
        'description',
        'father_id',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
//        'id',
    ];

    protected $casts = [
        'title' => 'string',
        'sub_title' => 'string',
        'description' => 'string',
        'father_id' => 'integer',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];


    protected $with = ["image"];
    /**
     * @return MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Images::class, 'imageable');
    }


    public function groupable(): MorphTo
    {
        return $this->morphTo();
    }
}
