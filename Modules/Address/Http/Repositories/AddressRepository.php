<?php

namespace Modules\Address\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Address\Entities\Address;

class AddressRepository extends BaseRepository
{
    public function model(): string
    {
        return Address::class;
    }

    public function relations(): array
    {
        return [];
    }
}
