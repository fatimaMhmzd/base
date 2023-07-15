<?php

namespace Modules\ShopBasket\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Product\Entities\ColorProduct;
use Modules\ShopBasket\Entities\FactorItem;

class FactorItemRepository extends BaseRepository
{
    public function model(): string
    {
        return FactorItem::class;
    }

    public function relations(): array
    {
        return [];
    }
}
