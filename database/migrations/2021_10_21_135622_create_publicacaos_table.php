<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacao', function (Blueprint $table) {
            $table->id();
            $table->string('conteudo', 512);
            $table->boolean('estado')->default(true);
            $table->dateTime('data_criacao')->useCurrent();
            $table->unsignedBigInteger('agente_id')->nullable();
            $table->unsignedBigInteger('permissao_id')->nullable();
            $table->foreign('agente_id')->references('id')->on('agente');
            $table->foreign('permissao_id')->references('id')->on('permissao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicacao');
    }
}
