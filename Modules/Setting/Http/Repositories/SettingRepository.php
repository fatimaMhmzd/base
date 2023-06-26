<?php

namespace Modules\Setting\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Setting\Entities\Setting;

class SettingRepository extends BaseRepository
{
    public function model(): string
    {
        return Setting::class;
    }

    public function relations(): array
    {
        return [];
    }
}