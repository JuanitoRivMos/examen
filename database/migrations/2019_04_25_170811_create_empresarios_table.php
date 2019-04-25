<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('razonsocial')->unique();
            $table->string('nombre');
            $table->string('pais')->nullable();
            $table->string('tipo_moneda')->nullable();
            $table->string('estado')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('telefono')->nullable();
            $table->boolean('activo')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresarios');
    }
}
