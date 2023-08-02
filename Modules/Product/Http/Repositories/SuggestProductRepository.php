<?php

namespace Modules\Product\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Product\Entities\SuggestProduct;

class SuggestProductRepository extends BaseRepository
{
    public function model(): string
    {
        return SuggestProduct::class;
    }

    public function relations(): array
    {
        return [];
    }
}
