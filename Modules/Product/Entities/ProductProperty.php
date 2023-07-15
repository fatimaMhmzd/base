<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Color\Entities\Color;
use Modules\Polymorphism\Entities\Images;
use Modules\Size\Entities\Size;

class ProductProperty extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "color_id",
        "size_id",
        "product_id",
        "price",
        "available",
        "status",
    ];

    protected $with = ["image" , "color" , "size"];

    public function image()
    {
        return $this->morphOne(Images::class, 'imageable');
    }

    public function color(): HasOne
    {
        return $this->hasOne(Color::class, "id", "color_id");
    }
    public function size(): HasOne
    {
        return $this->hasOne(Size::class, "id", "size_id");
    }

}
