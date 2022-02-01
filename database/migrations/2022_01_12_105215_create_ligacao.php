<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligacao', function (Blueprint $table) {
            $table->unsignedBigInteger('agente_origem');
            $table->unsignedBigInteger('agente_destino');
            $table->boolean('is_aceito')->default(false);
            $table->boolean('estado')->default(false);
            $table->dateTime('data_criacao')->useCurrent();
            $table->foreign('agente_origem')->references('id')->on('agente');
            $table->foreign('agente_destino')->references('id')->on('agente');
            $table->primary(['agente_origem', 'agente_destino']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ligacao');
    }
}
