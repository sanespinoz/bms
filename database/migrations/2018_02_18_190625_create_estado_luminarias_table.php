<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoLuminariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_luminarias', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('estado');
            $table->boolean('on_off');
            $table->integer('valor_regulacion');

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
        Schema::drop('estado_luminarias');
    }
}
