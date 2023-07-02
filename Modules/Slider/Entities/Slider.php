<?php

namespace Modules\Slider\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Page\Entities\Page;
use Modules\Polymorphism\Entities\Image;
use Modules\Polymorphism\Entities\Images;

class Slider extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "page_id",
        "title",
        "sub_title",
        "link",
        "url",
        "description",
    ];

    protected $with = ["image"];

    /**
     * @return HasOne
     */
    public function market():HasOne
    {
        return $this->hasOne(Page::class,"id","page_id");
    }

    public function image()
    {
        return $this->morphOne(Images::class, 'imageable');
    }
}
