<?php

namespace Modules\ShopBasket\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class SendingMethod extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "sending_methods";

    protected $fillable = ["title","price","description"];

    protected $casts = [
        "title" => "string"
    ];
}
