<?php

namespace Modules\Setting\Http\imports;

use App\Imports\BaseImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\Setting\Http\Repositories\SettingRepository;

class SettingImport extends BaseImport implements ToCollection
{
    public function headers(): array
    {
        return [
            0 => 'key',
            1 => 'label',
            2 => 'value',
        ];

    }

    public function collection(Collection $collection)
    {
        $settings = $this->standard_data($collection);
        $settingRepository = new SettingRepository();

        foreach ($settings as $setting) {
            $settingRepository->create($setting);
        }
        echo "All Setting Imported Successfully";
    }

}
