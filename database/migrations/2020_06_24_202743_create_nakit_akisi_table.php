<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNakitAkisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nakit_akisi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(0);
            $table->integer('guest_id')->default(0);
            $table->integer('year')->default(0);
            $table->integer('month')->default(0);
            $table->integer('type_id')->default(0);
            $table->float('amount')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *user_id
    session_id
    year
    month
    type_id
    amount

     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nakit_akisi');
    }
}
