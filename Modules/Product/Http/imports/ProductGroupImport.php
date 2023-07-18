<?php

namespace Modules\Product\Http\imports;

use App\Imports\BaseImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\Product\Http\Repositories\ProductGroupRepository;

class ProductGroupImport extends BaseImport implements ToCollection
{
    public function headers(): array
    {
        return [
            0 => 'title',
            1 => 'sub_title',
            2 => 'description',
            3 => 'father_id',
            4 => 'sort_id',
            5 => 'display_on_homepage',
        ];

    }

    public function collection(Collection $collection)
    {
        $groups = $this->standard_data($collection);

        $groupRepository = new ProductGroupRepository();

        foreach ($groups as $group) {
            $groupRepository->create($group);
        }
        echo "All Group Imported Successfully";
    }

}
