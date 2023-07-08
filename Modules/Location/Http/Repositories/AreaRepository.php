<?php

namespace Modules\Location\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Location\Entities\Area;

class AreaRepository extends BaseRepository
{
    public function model(): string
    {
        return Area::class;
    }

    public function relations(): array
    {
        return ["country" , "province" , "city" , "town"];
    }


}
