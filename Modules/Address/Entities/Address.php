<?php

namespace Modules\Address\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "user_id",
        "country_id",
        "province_id",
        "city_id",
        "town_id",
        "area_id",
        "address",
        "post_code",
        "name",
        "family",
        "national_code",
        "mobile",
        "tel",
        "email",
        "company",
        "total_address",
        "description",
        "en_description",
        "status"
    ];
    protected $with = ["user"];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id');

    }

}
