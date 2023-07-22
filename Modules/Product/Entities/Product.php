<?php

namespace Modules\Product\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Color\Entities\Color;
use Modules\Comment\Entities\Comment;
use Modules\Polymorphism\Entities\Images;
use Modules\Size\Entities\Size;
use Modules\Unit\Entities\Unit;

class Product extends Model
{
    use HasFactory, SoftDeletes,Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table = "products";

    protected $appends = ['banner'];


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
    protected $with = ["image", "comments", "color", "size", "prices"];

    public function image(): MorphMany
    {
        return $this->morphMany(Images::class, 'imageable');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function group(): HasOne
    {
        return $this->hasOne(ProductGroup::class, "id", "product_group_id");
    }

    public function color(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, "product_properties", "product_id", "color_id");

    }

    public function size(): BelongsToMany
    {
        return $this->belongsToMany(Size::class, "product_properties", "product_id", "size_id");

    }

    public function unit(): HasOne
    {
        return $this->hasOne(Unit::class, "unit_weight",);

    }

    public function prices(): HasMany
    {
        return $this->hasMany(Price::class, "product_id");

    }

    public function getBannerAttribute()
    {
        /*$image ? $image->url : null;*/
        $image =Images::query()->where('imageable_type',Product::class)->where('imageable_id',$this->id,)->where('is_cover',1)->first();
        return $image?->url;
    }

}
