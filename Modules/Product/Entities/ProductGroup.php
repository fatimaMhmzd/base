<?php

namespace Modules\Product\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Polymorphism\Entities\Images;

class ProductGroup extends Model
{
    use HasFactory,SoftDeletes,Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $fillable = [
        "title",
        "sub_title",
        "slug",
        "description",
        "father_id",
        "sort_id",
        "display_on_homepage",
    ];

    protected $with = ["image"];

    public function image()
    {
        return $this->morphOne(Images::class, 'imageable');
    }

    public function products():HasMany
    {
        return $this->hasMany(Product::class, 'product_group_id');
    }



}
