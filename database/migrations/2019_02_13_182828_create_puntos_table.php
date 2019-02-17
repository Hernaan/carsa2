<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('disc_puntualidad_pos')->nullable();
            $table->integer('disc_puntualidad_neg')->nullable();
            $table->integer('disc_marcacion_neg')->nullable();
            $table->integer('disc_ausencia_neg')->nullable();
            $table->integer('disc_apercibimiento_neg')->nullable();
            $table->integer('disc_suspension_neg')->nullable();
            $table->integer('productividad_pos')->nullable();
            $table->integer('productividad_neg')->nullable();

            $table->integer('gestion_pos')->nullable();
            $table->integer('gestion_neg')->nullable();
            $table->integer('meritos_taller_curso')->nullable();
            $table->integer('merito_univ')->nullable();
            $table->integer('merito_espec')->nullable();

            $table->integer('be_disc_puntualidad')->nullable();
            $table->integer('be_disc_ausencia')->nullable();
            $table->integer('be_disc_apercib')->nullable();

            $table->integer('be_prod_fluor')->nullable();
            $table->integer('be_prod_fluor_verde')->nullable();
            $table->integer('be_prod_verde')->nullable();
            
            $table->integer('be_gestion_excelente')->nullable();
            $table->integer('be_gestion_exc_buena')->nullable();
            $table->integer('be_gestion_buena')->nullable();
            $table->bigInteger('total_puntos_positivos')->nullable();
            $table->bigInteger('total_puntos_negativos')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('puntos');
    }
}
