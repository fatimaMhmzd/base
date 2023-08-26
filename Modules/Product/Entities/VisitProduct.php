<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VisitProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "product_id",
    ];
    protected $appends = ['product' ,'visit','slug'];
    public function getProductAttribute()
    {

        $title= Product::query()->find($this->id)->title;


        return $title;
    }
    public function getVisitAttribute()
    {

        $num_visit= Product::query()->find($this->id)->num_visit;


        return $num_visit;
    }
    public function getSlugAttribute()
    {

        $slug= Product::query()->find($this->id)->slug;


        return $slug;
    }
}
