<?php

namespace Modules\ShopBasket\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Product\Entities\ColorProduct;
use Modules\ShopBasket\Entities\Factor;

class FactorRepository extends BaseRepository
{
    public function model(): string
    {
        return Factor::class;
    }

    public function relations(): array
    {
        return ['part'];
    }
}
