<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLamparasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamparas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('marca',50);
            $table->string('tipo',50);
            $table->integer('voltaje');
            $table->double('factor_potencia',4,3);
            $table->date('fecha_instalacion');
            $table->integer('potencia');
            $table->integer('vida');
            $table->integer('horas_activas');
            $table->integer('tiempo_restante');
            $table->enum('estado',['activa','inactiva']);
            $table->integer('luminaria_id')->unsigned();

            $table->foreign('luminaria_id')
                ->references('id')->on('luminarias')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

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
        Schema::drop('lamparas');
    }
}
