<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Polymorphism\Entities\Images;

class BlogGroup extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "blog_groups";

    protected $fillable = [
        "title",
        "sub_title",
        "slug",
        "description",
        "father_id",
        "sort_id",
        "display_on_homepage",
    ];

    protected $casts = [
        "title" => "string",
        "sub_title" => "string",
        "slug" => "string",
        "description" => "string",
        "father_id" => "integer",
        "sort_id" => "integer",
        "display_on_homepage" => "integer",

    ];
    protected $with = ["image","blogs"];

    public function image(): MorphOne
    {
        return $this->morphOne(Images::class, 'imageable');
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class, "group_id");
    }

}
