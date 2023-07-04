<?php

namespace Modules\Slider\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Slider\Entities\Slider;

class SliderRepository extends BaseRepository
{
    public function model(): string
    {
        return Slider::class;
    }

    public function relations(): array
    {
        return ['image','page'];
    }
}
