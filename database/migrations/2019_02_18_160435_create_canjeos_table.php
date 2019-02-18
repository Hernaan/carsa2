<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanjeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canjeos', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('monto_canjeo');
            $table->integer('id_producto')->unsigned();
            $table->integer('user_canjeo')->unsigned();
            $table->foreign('user_canjeo')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_producto')->references('id')->on('products');
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
        Schema::drop('canjeos');
    }
}
