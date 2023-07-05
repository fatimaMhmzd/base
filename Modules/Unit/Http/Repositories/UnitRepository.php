<?php

namespace Modules\Unit\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Unit\Entities\Unit;

class UnitRepository extends BaseRepository
{
    public function model(): string
    {
        return Unit::class;
    }

    public function relations(): array
    {
        return [];
    }
}
