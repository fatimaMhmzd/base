<?php

namespace Modules\Page\Http\imports;

use App\Imports\BaseImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\Page\Http\Repositories\PageRepository;

class PageImport extends BaseImport implements ToCollection
{
    public function headers(): array
    {
        return [
            0 => 'title',
            1 => 'sub_title',
            2 => 'seo_keyword',
            3 => 'seo_description',
            4 => 'link',
            5 => 'description',
            6 => 'content',
            7 => 'can_delete',
        ];

    }

    public function collection(Collection $collection)
    {
        $settings = $this->standard_data($collection);
        $settingRepository = new PageRepository();

        foreach ($settings as $setting) {
            $settingRepository->create($setting);
        }
        echo "All Page Imported Successfully";
    }
}
