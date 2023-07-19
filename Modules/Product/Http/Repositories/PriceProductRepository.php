<?php

namespace Modules\Product\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Product\Entities\Price;

class PriceProductRepository extends BaseRepository
{
    public function model(): string
    {
        return Price::class;
    }

    public function relations(): array
    {
        return [];
    }
}
