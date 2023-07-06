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
        "sub_title1",
        "sub_title2",
        "sub_title3",
        "sub_title4",
        "link",
        "url",
        "description",
    ];

    protected $with = ["image" , "page"];

    /**
     * @return HasOne
     */
    public function page():HasOne
    {
        return $this->hasOne(Page::class,"id","page_id");
    }

    public function image()
    {
        return $this->morphOne(Images::class, 'imageable');
    }
}
