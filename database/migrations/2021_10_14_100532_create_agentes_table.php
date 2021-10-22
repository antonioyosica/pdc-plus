<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agente', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo', 255)->nullable();
            $table->enum('genero', ['M', 'F'])->nullable();
            $table->date('data_nascimento')->nullable();
            $table->text('foto_capa')->nullable();
            $table->text('foto_perfil')->nullable();
            $table->string('descricao', 512)->nullable();
            $table->enum('tipo', ['Individual', 'Organizacional'])->nullable();
            $table->string('username', 50)->unique();
            $table->string('email', 255)->unique();
            $table->text('password');
            $table->string('remember_token', 300)->nullable();
            $table->dateTime('data_criacao')->useCurrent();
            $table->boolean('estado')->default(true);
            $table->unsignedBigInteger('permissao_id')->nullable();
            $table->unsignedBigInteger('cidade_id')->nullable();
            $table->foreign('permissao_id')->references('id')->on('permissao');
            $table->foreign('cidade_id')->references('id')->on('cidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agente');
    }
}
