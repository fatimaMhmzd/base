<?php

namespace Modules\Product\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Product\Entities\ProductGroup;

class ProductGroupRepository extends BaseRepository
{
    public function model(): string
    {
        return ProductGroup::class;
    }

    public function relations(): array
    {
        return ['image'];
    }
}
