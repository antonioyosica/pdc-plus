<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenteEstado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agente_estado', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agente_id');
            $table->boolean('estado')->default(0);
            $table->dateTime('data')->useCurrent();
            $table->foreign('agente_id')->references('id')->on('agente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agente_estado');
    }
}
