<?php

namespace Modules\ShopBasket\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "payment_methods";

    protected $fillable = ["title","description"];

    protected $casts = [
        "title" => "string"
    ];
}
