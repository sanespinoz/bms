<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuminariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luminarias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identificacion',50)->unique();
            $table->string('ubicacion',50)->nullable();
            $table->string('marca',50);
            $table->string('tipo',50);
            $table->string('denominacion',100);
            $table->integer('cant_lamparas');
            $table->integer('consumo');
            $table->integer('tiempo_uso');


            $table->string('dimensiones',50);
            $table->string('temperatura_color',50);
            $table->string('flujo_luminoso',50);
            $table->string('color_luz',50);
            $table->string('distribucion_luza',50);

            $table->integer('voltaje_nominal');
            $table->double('factor_potencia',4,3);
            $table->date('fecha_instalacion');
            $table->date('fecha_baja');
            $table->integer('potencia_nominal');
            $table->integer('potencia_lampara');
            $table->integer('frecuencia');
            $table->integer('corriente_nominal');
            $table->integer('vida');
            $table->integer('horas_activas');
            $table->integer('tiempo_restante');
            $table->enum('estado',['activa','inactiva','mantenimiento']);




            $table->integer('grupo_id')->unsigned();

            $table->foreign('grupo_id')
                ->references('id')->on('grupos')
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
        Schema::drop('luminarias');
    }
}
