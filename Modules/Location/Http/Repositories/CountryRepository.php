<?php

namespace Modules\Location\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Location\Entities\Country;

class CountryRepository extends BaseRepository
{
    public function model(): string
    {
        return Country::class;
    }

    public function relations(): array
    {
        return [];
    }
}
