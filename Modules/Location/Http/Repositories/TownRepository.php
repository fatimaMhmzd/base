<?php

namespace Modules\Location\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Location\Entities\Town;

class TownRepository extends BaseRepository
{
    public function model(): string
    {
        return Town::class;
    }

    public function relations(): array
    {
        return ["country" , "province" , "city"];
    }


}
