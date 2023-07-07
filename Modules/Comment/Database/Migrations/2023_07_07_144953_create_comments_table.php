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
        Schema::create('comments_polymorphism', function (Blueprint $table) {
            $table->comment('جدول ذخیره کامنت ها');
            $table->id();
            $table->morphs('commentable');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('replay_to_comments_id')->nullable()->comment('نظری که بهش کامنت شده');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('title')->nullable()->comment('عنوان');
            $table->text('content')->comment('متن');
            $table->boolean('display')->nullable()->comment('');
            $table->boolean('pin')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('comments_polymorphism');
    }
};
