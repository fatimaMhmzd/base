<?php

namespace Modules\Product\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Product\Entities\ProductProperty;

class ProductPropertyRepository extends BaseRepository
{
    public function model(): string
    {
        return ProductProperty::class;
    }

    public function relations(): array
    {
        return ['image'];
    }
}
