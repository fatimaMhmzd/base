<?php

namespace Modules\Product\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Product\Entities\WishList;

class WishListRepository extends BaseRepository
{
    public function model(): string
    {
        return WishList::class;
    }

    public function relations(): array
    {
        return [];
    }
}
