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
        Schema::create('suggests', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('عنوان');
            $table->string('sub_title')->nullable()->comment('زیر عنوان');
            $table->string('title_banner')->nullable()->comment('عنوان بنر');
            $table->string('sub_title_banner')->nullable()->comment('زیر عنوان بنر');
            $table->string('lable_banner')->nullable()->comment('برچسب بنر');
            $table->string('link_banner')->nullable()->comment('لینک بنر');
            $table->string('lable_description')->nullable()->comment('توضیحات بنر');
            $table->smallInteger('sort_id')->default(0);
            $table->boolean('display_on_homepage')->default(0);
            $table->timestamps();
        });
        DB::table('suggests')->insert(array(
            array('title' => 'بالاترین امتیاز'),
            array('title' => 'بیشترین فروش'),
            array('title' => 'برترین محصولات'),
            array('title' => 'تخفیف های ویژه'),
            array('title' => 'محصولات ویژه'),
            array('title' => 'محصولات پرفروش' ),

        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suggests');
    }
};
