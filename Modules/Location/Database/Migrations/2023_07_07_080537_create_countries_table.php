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
        Schema::create('location_countries', function (Blueprint $table) {
            $table->id();
            $table->string('fa_name');
            $table->string('en_name')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        DB::table('location_countries')->insert(array(
            array('id'=>1 ,'fa_name' => 'ایران' , 'en_name' => 'Iran'),
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_countries');
    }
};
