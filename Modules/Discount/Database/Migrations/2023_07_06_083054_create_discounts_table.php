<?php

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
        Schema::create('discounts', function (Blueprint $table) {
            $table->comment('جدول کدهای تخفیف');
            $table->id();
            $table->string('title')->comment('عنوان');
            $table->string('code');
            $table->smallInteger('type')->comment('درصدی/مبلغی');
            $table->bigInteger('advertise_limit_number')->nullable();
            $table->bigInteger('value')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->smallInteger('user_type')->default(0);
            $table->boolean('can_use_pesonel')->default(false);
            $table->bigInteger('min_factor_number')->nullable();
            $table->bigInteger('min_count_factor_number')->nullable();
            $table->bigInteger('max_amount')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('user_limit_number')->nullable();
            $table->bigInteger('usage_count')->default(0);
            $table->bigInteger('remain_count')->nullable();
            $table->bigInteger('creator_user_id')->nullable();
            $table->bigInteger('updator_user_id')->nullable();
            $table->boolean('global_user')->default(0);
            $table->boolean('global_product')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
};
