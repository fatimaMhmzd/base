<?php

namespace Modules\Product\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Product\Entities\SizeProduct;

class SizeProductRepository extends BaseRepository
{
    public function model(): string
    {
        return SizeProduct::class;
    }

    public function relations(): array
    {
        return [];
    }
}
