<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Group\Entities\Groups;
use Modules\Polymorphism\Entities\Images;
use Modules\Slider\Entities\Slider;

class Page extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "title",
        "sub_title",
        "link",
        "description",
        "content",
    ];

    protected $with = ["image"];

    public function image(): MorphOne
    {
        return $this->morphOne(Images::class, 'imageable');
    }
    public function slider(): HasMany
    {
        return $this->hasMany(Slider::class, 'page_id');
    }

}
