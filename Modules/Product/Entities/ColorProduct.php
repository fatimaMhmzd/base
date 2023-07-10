<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Polymorphism\Entities\Images;

class ColorProduct extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "color_id",
        "product_id",
        "price",
        "available",
        "status",
    ];

    protected $with = ["image"];

    public function image()
    {
        return $this->morphOne(Images::class, 'imageable');
    }
}
