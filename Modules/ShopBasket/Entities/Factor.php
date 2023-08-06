<?php

namespace Modules\ShopBasket\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use JetBrains\PhpStorm\ArrayShape;
use Modules\Address\Entities\Address;
use Modules\Discount\Entities\Discount;

class Factor extends Model
{
    use HasFactory,SoftDeletes;
    const factor_status_open = 0;
    const factor_status_close = 1;
    const status_processed = 0;
    const status_packing = 1;
    const status_shipped = 2;
    const status_deliveried = 3;

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

    protected $appends = ['status_order' , 'status_order_title'];
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


    public static function getStatusOrder(): array
    {
        return [
            self::status_processed,
            self::status_packing,
            self::status_shipped,
            self::status_deliveried,
        ];
    }

    #[ArrayShape([self::status_processed => "string", self::status_packing => "string", self::status_shipped => "string" , self::status_deliveried  => "string"])]
    public static function getStatusOrderPersian(): array
    {
        return [
            self::status_processed => 'پردازش شد',
            self::status_packing => 'بسته بندی شد',
            self::status_shipped => 'ارسال شد',
            self::status_deliveried => 'تحویل داده شد',
        ];
    }

    public static function getStatusOrderTitleAttribute($status = null): array|bool|int|string|null
    {
        $statuses = self::getStatusOrderPersian();
        if (!is_null($status)) {
            if (is_string_persian($status)) {
                return array_search($status, $statuses) ?? null;
            }
            if (is_int($status) && in_array($status, array_keys($statuses))) {
                return $statuses[$status] ?? null;
            }
            return null;
        }
        return $statuses;
    }

    public function getStatusOrderAttribute()
    {

            $status= Factor::query()->find($this->id)->status;


        return $this->getStatusOrderTitleAttribute($status);
    }
}
