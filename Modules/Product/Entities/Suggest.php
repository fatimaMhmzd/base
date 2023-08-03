<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Polymorphism\Entities\Images;

class Suggest extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "sub_title",
        "title_banner",
        "sub_title_banner",
        "lable_banner",
        "link_banner",
        "lable_description",
        "sort_id",
        "display_on_homepage",
    ];
     protected $with = ["image" ];
    public function product():BelongsToMany
    {
        return $this->belongsToMany(Product::class, "suggest_products", "suggest_id" , "product_id");
    }

    public function image()
    {
        return $this->morphOne(Images::class, 'imageable');
    }
}
