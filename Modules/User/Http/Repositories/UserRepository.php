<?php

namespace Modules\User\Http\Repositories;

use App\Http\Repository\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository
{
    public function model(): string
    {
        return User::class;
    }

    public function relations(): array
    {
        return [];
    }
}
