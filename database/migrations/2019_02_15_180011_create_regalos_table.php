<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegalosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regalos', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('puntos');
            $table->integer('user_regalo')->unsigned();
            $table->foreign('user_regalo')->references('id')->on('users')->onDelete('cascade');
            $table->integer('user_recibio')->unsigned();
            $table->foreign('user_recibio')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('regalos');
    }
}
