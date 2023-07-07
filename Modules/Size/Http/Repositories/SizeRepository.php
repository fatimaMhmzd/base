<?php

namespace Modules\Size\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Size\Entities\Size;

class SizeRepository extends BaseRepository
{
    public function model(): string
    {
        return Size::class;
    }

    public function relations(): array
    {
        return [];
    }
}
