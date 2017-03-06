<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type',['Atendimento', 'Medição de Projeto', 'Apresentação do Projeto',
                'Fechamento', 'Financeiro', 'Agendamento de conferência do projeto',
                'Pasta Técnica', 'Envio para a Fábrica', 'Produção', 'Logística',
                'Montagem', 'Pós Venda']);
            $table->integer('days');

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
        Schema::dropIfExists('steps');
    }
}
