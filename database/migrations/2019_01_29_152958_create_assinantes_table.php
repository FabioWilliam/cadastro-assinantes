<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssinantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assinantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 50);
            $table->string('email',60);
            $table->string('senha', 60);
            $table->string('confirma_senha', 60);
            $table->string('cpf', 14);
            $table->char('sexo', 1);
            $table->date('data_nascimento');
            $table->string('cep', 9);
            $table->string('tipo_logradouro', 10);
            $table->string('logradouro', 60);
            $table->string('numero', 6);
            $table->string('complemento', 20)->nullable();
            $table->string('bairro', 60);
            $table->string('cidade', 60);
            $table->char('estado', 2);
            $table->string('telefone', 15);
            $table->string('interesses', 250);
            $table->boolean('aceita_receber_informacoes')->default(false);
            $table->text('outras_informacoes', 500)->nullable();
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
        Schema::dropIfExists('assinantes');
    }
}
