<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Suggest extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "sub_title",
        "sort_id",
        "display_on_homepage",
    ];
     protected $with = [ "product" ];
    public function product():BelongsToMany
    {
        return $this->belongsToMany(Product::class, "suggest_products", "suggest_id" , "product_id");
    }
}
