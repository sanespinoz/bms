<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_rol', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('permiso');



            $table->integer('report_id')->unsigned()
                ->foreign('report_id')
                ->references('id')->on('reports')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->integer('rol_id')->unsigned()
                ->foreign('rol_id')
                ->references('id')->on('rols')
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
        Schema::drop('report_rol');
    }
}
