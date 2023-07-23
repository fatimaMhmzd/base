<?php

namespace Modules\Blog\Http\imports;

use App\Imports\BaseImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\Blog\Http\Repositories\BlogGroupRepository;
use Modules\Setting\Http\Repositories\SettingRepository;

class BlogGroupImport extends BaseImport implements ToCollection
{
    public function headers(): array
    {
        return [
            0 => 'title',
            1 => 'sub_title',
            2 => 'slug',
            3 => 'description',
            4 => 'father_id',
            5 => 'sort_id',
            6 => 'display_on_homepage',
        ];

    }

    public function collection(Collection $collection)
    {
        $blogGroups = $this->standard_data($collection);

        $blogGroupRepository = new BlogGroupRepository();

        foreach ($blogGroups as $blogGroup) {

            $blogGroupRepository->create($blogGroup);
        }
        echo "All BlogGroups Imported Successfully";
    }

}
