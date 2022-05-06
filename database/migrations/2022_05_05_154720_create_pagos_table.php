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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->double('monto', 10, 2);
            $table->string('descripcion', 250);

            $table->bigInteger('reparacion_id')->unsigned();
            $table->foreign('reparacion_id')->references('id')->on('reparacions')->onDelete('cascade');
            
            $table->bigInteger('tipopago_id')->unsigned();
            $table->foreign('tipopago_id')->references('id')->on('tipopagos')->onDelete('cascade');

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
        Schema::dropIfExists('pagos');
    }
};
