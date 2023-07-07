<?php

namespace Modules\Location\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "location_provinces";

    protected $fillable = ["country_id","fa_name","en_name"];

    protected $casts = [
        "country_id" => "integer",
        "fa_name" => "string",
        "en_name" => "string"
    ];
    protected $with = ["country"];
    public function country(): HasOne
    {
        return $this->hasOne(Country::class, "id", "country_id");
    }
}
