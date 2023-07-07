<?php

namespace Modules\Blog\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Blog\Entities\BlogLable;

class BlogLableRepository extends BaseRepository
{
    public function model(): string
    {
        return BlogLable::class;
    }

    public function relations(): array
    {
        return ["image"];
    }
}
