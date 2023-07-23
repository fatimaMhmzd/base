<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Blog\Http\imports\BlogGroupImport;
use Modules\Blog\Http\imports\BlogImport;
use Modules\Page\Http\imports\PageImport;
use Modules\Polymorphism\Http\imports\ImageImport;
use Modules\Product\Http\imports\ProductGroupImport;
use Modules\Product\Http\imports\ProductImport;
use Modules\Setting\Http\imports\SettingImport;
use Modules\Slider\Http\imports\SliderImport;
use Symfony\Component\Console\Output\ConsoleOutput;

class InsertData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'insert all data to database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $output = new ConsoleOutput();
        echo "**** Running Migrations **** :\n";
        Artisan::call("migrate:refresh", [], $output);
        echo "Start Importing :\n";

        echo "Importing Settings... :\n";
        Excel::import(new SettingImport(), public_path('imports/setting.xlsx'));

        echo "\n";

        echo "Importing pages... :\n";
        Excel::import(new PageImport(), public_path('imports/page.xlsx'));

        echo "\n";

        echo "Importing productGroups... :\n";
        Excel::import(new ProductGroupImport(), public_path('imports/productGroup.xlsx'));

        echo "\n";

        echo "Importing products... :\n";
        Excel::import(new ProductImport(), public_path('imports/product.xlsx'));

        echo "\n";

        echo "Importing sliders... :\n";
        Excel::import(new SliderImport(), public_path('imports/slider.xlsx'));

        echo "\n";

        echo "Importing images... :\n";
        Excel::import(new ImageImport(), public_path('imports/images.xlsx'));

        echo "\n";

        echo "Importing blogGroups... :\n";
        Excel::import(new BlogGroupImport(), public_path('imports/blogGroup.xlsx'));

        echo "\n";

        echo "Importing blogs... :\n";
        Excel::import(new BlogImport(), public_path('imports/blog.xlsx'));


        echo "php artisan necessary command";

        echo "\n **** End Migrations **** :\n";echo "\n **** Storage Link Creating... **** :";
        Artisan::call("storage:link", [], $output);
        Artisan::call("optimize:clear", [], $output);
        echo "\n";

    }
}
