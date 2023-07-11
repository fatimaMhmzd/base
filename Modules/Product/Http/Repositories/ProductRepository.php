<?php

namespace Modules\Product\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Product\Entities\Product;

class ProductRepository extends BaseRepository
{
    public function model(): string
    {
        return Product::class;
    }

    public function relations(): array
    {
        return ['image','group','color','size'];
    }
}
