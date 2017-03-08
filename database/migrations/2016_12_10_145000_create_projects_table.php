<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->date('start_project');
            $table->boolean('completed')->default(false);
            $table->enum('current_step',['Atendimento', 'Medição de Projeto', 'Apresentação do Projeto',
                'Fechamento', 'Financeiro', 'Agendamento de conferência do projeto',
                'Pasta Técnica', 'Envio para a Fábrica', 'Produção', 'Logística',
                'Montagem', 'Pós Venda'])->default("Atendimento");

            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascate');

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
        Schema::dropIfExists('projects');
    }
}
