<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Polymorphism\Entities\Images;

class ProductGroup extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "title",
        "sub_title",
        "description",
        "father_id",
        "sort_id",
        "display_on_homepage",
    ];

    protected $with = ["image","product"];

    public function image()
    {
        return $this->morphOne(Images::class, 'imageable');
    }
    public function product()
    {
        return $this->hasMany(Product::class, "group_id");
    }
}
