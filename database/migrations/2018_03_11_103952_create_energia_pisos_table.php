<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnergiaPisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('energia_pisos', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('consumo_total',5,2);
            $table->decimal('pico_consumo',5,2);
            $table->decimal('prom_tension',5,2);
            $table->decimal('max_tension',5,2);
            $table->decimal('min_tension',5,2);
            $table->decimal('prom_corriente',5,2);
            $table->integer('consumo_iluminacion');
            $table->decimal('potencia',5,2);
            $table->dateTime('fecha');


            $table->integer('piso_id')->unsigned();
            $table->timestamps();

            $table->foreign('piso_id')
                ->references('id')->on('pisos')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('energia_pisos');
    }
}
