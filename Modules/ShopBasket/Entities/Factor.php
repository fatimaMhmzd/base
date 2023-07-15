<?php

namespace Modules\ShopBasket\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Address\Entities\Address;
use Modules\Discount\Entities\Discount;

class Factor extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "user_id",
        "address_id",
        "discount_id",
        "total_part_price",
        "total_amount",
        "shipping_amount",
        "send_method",
        "factor_status",
        "status",
    ];

    protected $with = ["part" , "user","address","discount"];
    public function part(): HasMany
    {
        return $this->hasMany(FactorItem::class , 'factor_id');

    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id');

    }
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class , 'address_id');

    }
    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class , 'discount_id');

    }
}
