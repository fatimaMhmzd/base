<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Group\Entities\Groups;
use Modules\Polymorphism\Entities\Images;

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

    public function image(): MorphMany
    {
        return $this->morphMany(Images::class, 'imageable');
    }

}
