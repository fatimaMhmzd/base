<?php

namespace Modules\Polymorphism\Http\imports;

use App\Imports\BaseImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\Polymorphism\Entities\Images;

class ImageImport extends BaseImport implements ToCollection
{
    public function headers(): array
    {
        return [
            0 => 'imageable_type',
            1 => 'imageable_id',
            2 => 'title',
            3 => 'original_name',
            4 => 'image',
            5 => 'type',
            6 => 'url',
            7 => 'is_cover',
            8 => 'is_public',
        ];

    }

    public function collection(Collection $collection)
    {
        $images = $this->standard_data($collection);
        $imageRepository = new Images();

        foreach ($images as $image) {
            $imageRepository->create($image);
        }
        echo "All Image Imported Successfully";
    }
}
