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
            $table->string('senha', 60);
            $table->string('confirma_senha', 60);
            $table->string('cpf', 14);
            $table->string('sexo', 1);
            $table->date('data_nascimento');
            $table->string('cep', 9);
            $table->string('tipo_logradouro', 10);
            $table->string('logradouro', 60);
            $table->string('numero', 6);
            $table->string('complemento', 20)->nullable();
            $table->string('bairro', 60);
            $table->string('telefone', 15);
            $table->string('interesses', 250);
            $table->string('aceita_receber_informacoes', 1);
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
