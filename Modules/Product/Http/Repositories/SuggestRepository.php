<?php

namespace Modules\Product\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Product\Entities\Suggest;

class SuggestRepository extends BaseRepository
{
    public function model(): string
    {
        return Suggest::class;
    }

    public function relations(): array
    {
        return ["product"];
    }
}
