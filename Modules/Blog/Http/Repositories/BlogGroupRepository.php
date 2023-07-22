<?php

namespace Modules\Blog\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Blog\Entities\BlogGroup;

class BlogGroupRepository extends BaseRepository
{
    public function model(): string
    {
        return BlogGroup::class;
    }

    public function relations(): array
    {
        return ["image"];//, "blogs"
    }
}
