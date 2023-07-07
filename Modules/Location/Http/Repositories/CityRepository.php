<?php

namespace Modules\Location\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Location\Entities\City;

class CityRepository extends BaseRepository
{
    public function model(): string
    {
        return City::class;
    }

    public function relations(): array
    {
        return ["country" , "province"];
    }


}
