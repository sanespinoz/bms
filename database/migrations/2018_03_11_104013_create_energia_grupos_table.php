<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnergiaGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('energia_grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->integer('grupo_id')->unsigned();
            $table->decimal('consumo_total',5,2);
            $table->decimal('prom_corriente',5,2);
            $table->decimal('pico_corriente',5,2);
            $table->decimal('potencia',5,2);

            $table->timestamps();

            $table->foreign('grupo_id')
                ->references('id')->on('grupos')
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
        Schema::drop('energia_grupos');
    }
}
