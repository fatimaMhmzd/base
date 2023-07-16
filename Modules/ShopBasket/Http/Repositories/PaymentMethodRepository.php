<?php

namespace Modules\ShopBasket\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\ShopBasket\Entities\PaymentMethod;

class PaymentMethodRepository extends BaseRepository
{
    public function model(): string
    {
        return PaymentMethod::class;
    }

    public function relations(): array
    {
        return [];
    }
}
