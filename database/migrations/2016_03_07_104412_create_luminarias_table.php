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
