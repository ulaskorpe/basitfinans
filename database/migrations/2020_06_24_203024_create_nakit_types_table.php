<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNakitTypesTable extends Migration
{
    /**
     * Run the migrations.
     *id
    user_id
    session_id
    Type [ bool ]
    parent_type_id
     * type_name
    order

     * @return void
     */
    public function up()
    {
        Schema::create('nakit_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(0);
            $table->integer('guest_id')->default(0);
            $table->boolean('type')->default(0);
            $table->integer('parent_type_id')->default(0);
            $table->string('type_name');
            $table->integer('order');
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
        Schema::dropIfExists('nakit_types');
    }
}
