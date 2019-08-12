<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('email');
            $table->string('personalCode');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('phone');
            $table->tinyInteger('active')->nullable();
            $table->tinyInteger('isDead')->nullable()->default(0);
            $table->string('lang')->nullable()->default('est');

            $table->timestamps();
            $table->unique(['personalCode', 'email']);
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
