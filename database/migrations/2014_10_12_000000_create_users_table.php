<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->default(null);
            $table->string('surname')->nullable()->default(null);
            $table->string('username')->nullable()->default(null)->unique();;
            $table->string('token')->unique();
            $table->date('birthday')->nullable()->default(null);
            $table->boolean('gender')->default(0);
            $table->boolean('is_active')->default(0);
            $table->integer('job_id')->default(0);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->nullable()->default(null);
            $table->date('banned_until')->nullable()->default(null);
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
