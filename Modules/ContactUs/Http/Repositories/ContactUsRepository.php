<?php

namespace Modules\ContactUs\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\ContactUs\Entities\ContactUs;

class ContactUsRepository extends BaseRepository
{
    public function model(): string
    {
        return ContactUs::class;
    }

    public function relations(): array
    {
        return [];
    }
}
