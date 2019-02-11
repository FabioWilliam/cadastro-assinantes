<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revistas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 50);
            $table->string('codigo', 2)->unique()->index();
            $table->text('descricao', 500);
            $table->string('formato',1);
            $table->decimal('valor',5,2);
            $table->string('vigencia',10);
            $table->string('url',60);
            $table->string('capa',60);
            $table->boolean('participa_de_promocao')->default(false);
            $table->string('assuntos',300);
            $table->text('observacoes',500)->nullable();
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
        Schema::dropIfExists('revistas');
    }
}
