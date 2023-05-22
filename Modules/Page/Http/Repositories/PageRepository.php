<?php

namespace Modules\Page\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Page\Entities\Page;

class PageRepository extends BaseRepository
{
    public function model(): string
    {
        return Page::class;
    }

    public function relations(): array
    {
        return [];
    }
}
