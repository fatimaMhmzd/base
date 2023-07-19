<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "prices_product";
    protected $fillable = [
        "product_id",
        "price",
        "number",

    ];

    protected $with =  "product" ;


    public function product(): HasOne
    {
        return $this->hasOne(Product::class, "id", "color_id");
    }


}
