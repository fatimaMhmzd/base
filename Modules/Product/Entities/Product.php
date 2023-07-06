<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Polymorphism\Entities\Images;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "products";
    protected $fillable = [
        "title",
        "sub_title",
        "brand",
        "full_title",
        "product_group_id",
        "price",
        "off_price",
        "off",
        "short_description",
        "long_description",
        "available",
        "slug",
        "link",
        "key_word",
        "seo_description",
        "weight",
        "weight_with_packaging",
        "unit_weight",
        "status",
        "barcode",
        "creator",
        "updater",
        "avg_rate",
        "num_sell",
        "num_visit",
    ];

    protected $casts = [
        "title" => "string",
        "sub_title" => "string",
        "brand" => "string",
        "full_title" => "string",
        "product_group_id" => "integer",
        "price" => "integer",
        "off_price" => "integer",
        "off" => "integer",
        "short_description" => "string",
        "long_description" => "string",
        "available" => "integer",
        "slug" => "string",
        "link" => "string",
        "key_word" => "string",
        "seo_description" => "string",
        "net_weight" => "integer",
        "weight_with_packaging" => "integer",
        "unit_weight" => "integer",
        "status" => "integer",
        "barcode" => "integer",
        "creator" => "integer",
        "updater" => "integer",
        "avg_rate" => "integer",
        "num_sell" => "integer",
        "num_visit" => "integer",
        "deleted_at" => "timestamp",
        "created_at" => "timestamp",
        "updated_at" => "timestamp"
    ];
    protected $with = ["image" , "group"];

    public function image()
    {
        return $this->morphMany(Images::class, 'imageable');
    }

    public function group(): HasOne
    {
        return $this->hasOne(ProductGroup::class, "id", "product_group_id");
    }
}
