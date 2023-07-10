<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('value');
            $table->softDeletes();
            $table->timestamps();
        });
        DB::table('setting')->insert(array(
            array('key' => 'لوگو' ),
            array('key' => 'ایمیل'),
            array('key' => 'فاکس'),
            array('key' => 'نام کمپانی' ),
            array('key' => 'درباره کمپانی'),
            array('key' => 'آدرس' ),
            array('key' => 'کد پستی' ),
            array('key' => 'ساعت کاری' ),
            array('key' => 'شماره تماس' ),
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
