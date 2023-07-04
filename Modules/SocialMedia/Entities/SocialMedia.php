<?php

namespace Modules\SocialMedia\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Polymorphism\Entities\Images;

class SocialMedia extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "title",
        "sub_title",
        "link",
        "url",
        "description",
    ];

    protected $with = ["image"];

    public function image()
    {
        return $this->morphOne(Images::class, 'imageable');
    }
}
