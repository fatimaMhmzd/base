<?php

namespace Modules\Slider\Http\imports;

use App\Imports\BaseImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\Slider\Http\Repositories\SliderRepository;

class SliderImport extends BaseImport implements ToCollection
{
    public function headers(): array
    {
        return [
            0 => 'page_id',
            1 => 'title',
            2 => 'sub_title1',
            3 => 'sub_title2',
            4 => 'sub_title3',
            5 => 'sub_title4',
            6 => 'link',
            7 => 'url',
            8 => 'description',

        ];

    }

    public function collection(Collection $collection)
    {
        $sliders = $this->standard_data($collection);
        $sliderRepository = new SliderRepository();

        foreach ($sliders as $slider) {
            $sliderRepository->create($slider);
        }
        echo "All Slider Imported Successfully";
    }
}
