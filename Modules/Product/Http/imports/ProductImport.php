<?php

namespace Modules\Product\Http\imports;

use App\Imports\BaseImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\Product\Http\Repositories\ProductRepository;

class ProductImport extends BaseImport implements ToCollection
{
    public function headers(): array
    {
        return [
            0 => 'title',
            1 => 'sub_title',
            2 => 'brand',
            3 => 'full_title',
            4 => 'product_group_id',
            5 => 'price',
            6 => 'off_price',
            7 => 'off',
            8 => 'short_description',
            9 => 'long_description',
            10 => 'available',
            11 => 'slug',
            12 => 'link',
            13 => 'key_word',
            14 => 'seo_description',
            15 => 'weight',
            16 => 'weight_with_packaging',
            17 => 'unit_weight',
            18 => 'status',
            19 => 'barcode',
            20 => 'creator',
            21 => 'updater',
            22 => 'avg_rate',
            23 => 'num_sell',
            24 => 'num_visit',
        ];

    }

    public function collection(Collection $collection)
    {
        $products = $this->standard_data($collection);

        $productRepository = new ProductRepository();

        foreach ($products as $product) {
            $productRepository->create($product);
        }
        echo "All Product Imported Successfully";
    }

}
