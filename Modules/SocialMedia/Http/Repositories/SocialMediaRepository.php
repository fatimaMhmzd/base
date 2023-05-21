<?php

namespace Modules\SocialMedia\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\SocialMedia\Entities\SocialMedia;

class SocialMediaRepository extends BaseRepository
{
    public function model(): string
    {
        return SocialMedia::class;
    }

    public function relations(): array
    {
        return [];
    }
}
