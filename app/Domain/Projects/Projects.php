<?php

namespace App\Domain\Projects;

use App\Domain\Clients\Clients;
use App\Domain\Steps\Steps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Projects extends Model
{
    const ATENDIMENTO = 'Atendimento';
    const MEDIACAODEPROJETOS = 'Medição de Projeto';
    const APRESENTACAODOPROJETO = 'Apresentação do Projeto';
    const FECHAMENTO = 'Fechamento';
    const FINANCEIRO = 'Financeiro';
    const AGENDAMENTODECONFERENCIADOPROJETO = 'Agendamento de conferência do projeto';
    const PASTATECNICA = 'Pasta Técnica';
    const ENVIOPARAAFABRICA = 'Envio para a Fábrica';
    const PRODUCAO = 'Produção';
    const LOGISTICA = 'Logística';
    const MONTAGEM = 'Montagem ';
    const POSVENDA = 'Pós-Venda';

    protected $fillable = [
        'description',
        'start_project',
        'current_step',
        'completed',
        'client_id',
    ];

    public function client(){
        return $this->hasOne('App\Domain\Clients\Clients');
    }

    public function steps(){
        return $this->belongsToMany(Steps::class, 'projects_steps', 'project_id', 'step_id')->withTimestamps();
    }
}
