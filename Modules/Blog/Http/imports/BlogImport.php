<?php

namespace Modules\Blog\Http\imports;

use App\Imports\BaseImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\Blog\Http\Repositories\BlogGroupRepository;
use Modules\Blog\Http\Repositories\BlogRepository;
use Modules\Setting\Http\Repositories\SettingRepository;

class BlogImport extends BaseImport implements ToCollection
{
    public function headers(): array
    {
        return [
            0 => 'group_id',
            1 => 'creator_user_id',
            2 => 'updator_user_id',
            3 => 'title',
            4 => 'sub_title',
            5 => 'link',
            6 => 'slug',
            7 => 'description',
            8 => 'content',
        ];

    }

    public function collection(Collection $collection)
    {
        $blogs = $this->standard_data($collection);

        $blogRepository = new BlogRepository();

        foreach ($blogs as $blog) {
            $blogRepository->create($blog);
        }
        echo "All Blogs Imported Successfully";
    }

}
