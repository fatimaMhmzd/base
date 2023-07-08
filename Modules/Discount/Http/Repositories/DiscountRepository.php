<?php

namespace Modules\Discount\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Discount\Entities\Discount;

class DiscountRepository extends BaseRepository
{
    public function model(): string
    {
        return Discount::class;
    }

    public function relations(): array
    {
        return [];
    }
}
