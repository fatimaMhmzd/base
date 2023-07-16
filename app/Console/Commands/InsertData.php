<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Page\Http\imports\PageImport;
use Modules\Setting\Http\imports\SettingImport;

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

        echo "Start Importing :\n";

        echo "Importing Settings... :\n";
        Excel::import(new SettingImport(), public_path('imports/setting.xlsx'));

        echo "\n";

        echo "Importing pages... :\n";
        Excel::import(new PageImport(), public_path('imports/page.xlsx'));

    }
}
