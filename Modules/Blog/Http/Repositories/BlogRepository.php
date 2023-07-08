<?php

namespace Modules\Blog\Http\Repositories;

use App\Http\Repository\BaseRepository;
use Modules\Blog\Entities\Blog;

class BlogRepository extends BaseRepository
{
    public function model(): string
    {
        return Blog::class;
    }

    public function relations(): array
    {
        return ["image" , "group" , "user" ,"lables"];
    }
}
