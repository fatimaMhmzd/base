<?php

namespace Modules\Product\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Product\Entities\ColorProduct;

class ColorProductRepository extends BaseRepository
{
    public function model(): string
    {
        return ColorProduct::class;
    }

    public function relations(): array
    {
        return ['image'];
    }
}
