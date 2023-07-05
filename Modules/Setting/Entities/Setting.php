<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Polymorphism\Entities\Images;

class Setting extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "key",
        "value",
    ];

    protected $with = ["image"];

    public function image()
    {
        return $this->morphOne(Images::class, 'imageable');
    }
}
