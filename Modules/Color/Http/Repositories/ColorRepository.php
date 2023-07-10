<?php

namespace Modules\Color\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Color\Entities\Color;

class ColorRepository extends BaseRepository
{
    public function model(): string
    {
        return Color::class;
    }

    public function relations(): array
    {
        return [];
    }
}
