<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableBodega extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bodegas', function (Blueprint $table) {
            $table->increments('id');
            $table->String('estado'); //activo o inactivo
            $table->String('trabajador'); //responsable
            $table->String('is'); //entrada salida
            $table->String('ubicacion'); // [Bodega | Selección | Packing]
            $table->unsignedInteger('pallet');
            $table->foreign('pallet')->references('id')->on('pallets');
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
        Schema::dropIfExists('bodegas');
    }
}
