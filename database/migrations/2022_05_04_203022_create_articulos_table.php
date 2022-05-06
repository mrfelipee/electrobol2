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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
  
            $table->bigInteger('marca_id')->unsigned();
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade');
            $table->bigInteger('tipoarticulo_id')->unsigned();
            $table->foreign('tipoarticulo_id')->references('id')->on('tipoarticulos')->onDelete('cascade');
  
            $table->bigInteger('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            
            $table->string('estado',20);

            $table->string('serie',25);
            $table->date('fecha');
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
        Schema::dropIfExists('articulos');
    }
};
