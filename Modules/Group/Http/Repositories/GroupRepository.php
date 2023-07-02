<?php

namespace Modules\Group\Http\Repositories;


use App\Http\Repository\BaseRepository;
use Modules\Group\Entities\Groups;

class GroupRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Groups::class;
    }


    /**
     * @return string[]
     */
    public function relations():array
    {
        return ['image'];
    }


}
