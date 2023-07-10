<?php

namespace Modules\ShopBasket\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FactorItem extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\ShopBasket\Database\factories\FactorItemFactory::new();
    }
}
