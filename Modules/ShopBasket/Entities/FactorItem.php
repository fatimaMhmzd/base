<?php

namespace Modules\ShopBasket\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Color\Entities\Color;
use Modules\Product\Entities\Product;
use Modules\Size\Entities\Size;

class FactorItem extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "factor_id",
        "product_id",
        "color_id",
        "size_id",
        "count",
        "last_price",
        "total_price",
        "this_poroduct_statues",
        "product_properties_id",
    ];

    protected $with = ["product" , "color" ,"size"];
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class , 'product_id');

    }
    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class , 'color_id');

    }
    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class , 'size_id');

    }
}
