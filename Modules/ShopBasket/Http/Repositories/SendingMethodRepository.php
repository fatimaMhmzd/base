<?php

namespace Modules\ShopBasket\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\ShopBasket\Entities\SendingMethod;

class SendingMethodRepository extends BaseRepository
{
    public function model(): string
    {
        return SendingMethod::class;
    }

    public function relations(): array
    {
        return [];
    }
}
