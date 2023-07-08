<?php

namespace Modules\Location\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "location_countries";

    protected $fillable = ["fa_name","en_name"];

    protected $casts = [
        "fa_name" => "string",
        "en_name" => "string"
    ];
}
