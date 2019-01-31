<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterDispositivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dispositivos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('sector_id')->unsigned();

            $table->foreign('sector_id')
                ->references('id')->on('sectores')
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
        Schema::table('dispositivos', function (Blueprint $table) {
            Schema::drop('dispositivos');
        });
    }
}
