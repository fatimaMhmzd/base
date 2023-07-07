<?php

namespace Modules\Location\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Location\Entities\Province;

class ProvinceRepository extends BaseRepository
{
    public function model(): string
    {
        return Province::class;
    }

    public function relations(): array
    {
        return ["country"];
    }


}
