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
            $table->id();
            $table->unsignedBigInteger('id_grouppermissions')->default('2');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->default('noimage.png');
            $table->enum('theme',['l', 'd'])->default('l')->comment('(l)ight, (d)ark');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_grouppermissions')
                ->references('id')
                ->on('grouppermissions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
