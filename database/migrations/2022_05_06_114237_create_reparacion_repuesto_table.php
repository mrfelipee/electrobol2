<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparacion_repuesto', function (Blueprint $table) {
            $table->unsignedBigInteger('reparacion_id');
            $table->foreign('reparacion_id')->references('id')->on('reparacions');
            $table->unsignedBigInteger('repuesto_id');
            $table->foreign('repuesto_id')->references('id')->on('repuestos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reparacion_repuesto', function (Blueprint $table) {
            //
        });
    }
};
