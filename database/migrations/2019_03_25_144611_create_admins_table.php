<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('title')->nullable()->default(null);
            $table->string('name_surname')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('avatar')->nullable()->default(null);
            $table->boolean('sudo')->default(0);
            $table->boolean('users')->default(0);
            $table->boolean('contents')->default(0);
            $table->boolean('reports')->default(0);
            $table->boolean('settings')->default(0);
            $table->boolean('active')->default(1);
            $table->char('lang',3)->default('tr');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
