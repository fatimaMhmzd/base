<?php

namespace Modules\Blog\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Blog\Entities\Lable;

class LableRepository extends BaseRepository
{
    public function model(): string
    {
        return Lable::class;
    }

    public function relations(): array
    {
        return [];
    }
}

