<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuggestProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        "suggest_id",
        "product_id",
    ];

   /* protected $with = ["suggests" , "product" ];*/
    public function suggests():BelongsTo
    {
        return $this->belongsTo(Suggest::class);
    }
    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
