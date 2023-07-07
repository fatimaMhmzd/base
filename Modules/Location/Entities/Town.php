<?php

namespace Modules\Location\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Town extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "location_towns";

    protected $fillable = ["country_id","province_id","city_id","fa_name","en_name"];

    protected $casts = [
        "country_id" => "integer",
        "province_id" => "integer",
        "city_id" => "integer",
        "fa_name" => "string",
        "en_name" => "string"
    ];
    protected $with = ["country" , "province" , "city"];
    public function country(): HasOne
    {
        return $this->hasOne(Country::class, "id", "country_id");
    }
    public function province(): HasOne
    {
        return $this->hasOne(Province::class, "id", "province_id");
    }
    public function city(): HasOne
    {
        return $this->hasOne(City::class, "id", "city_id");
    }
}
