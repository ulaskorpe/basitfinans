<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable()->default(null);
            $table->string('plot')->nullable()->default(null);
            $table->string('keywords')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->string('menu_title')->nullable()->default(null);
            $table->text('content')->nullable()->default(null);
            $table->string('language')->default('tr');
            $table->integer('order')->default(0);
            $table->integer('show')->default(1);
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
        Schema::dropIfExists('galleries');
    }
}
