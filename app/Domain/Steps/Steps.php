<?php

namespace App\Domain\Steps;

use App\Domain\Projects\Projects;
use Illuminate\Database\Eloquent\Model;

class Steps extends Model
{
    const ATENDIMENTO = 'Atendimento';
    const MEDIACAODEPROJETOS = 'Mediação de Projetos';
    const APRESENTACAODOPROJETO = 'Apresentação do Projeto';
    const FECHAMENTO = 'Fechamento';
    const FINANCEIRO = 'Financeiro';
    const AGENDAMENTODECONFERENCIADOPROJETO = 'Agendamento de Conferência do projeto';
    const PASTATECNICA = 'Pasta Técnica';
    const ENVIOPARAAFABRICA = 'Envio Para a Fábrica';
    const PRODUCAO = 'Produção';
    const LOGISTICA = 'Logística';
    const MONTAGEM = 'Montagem';
    const POSVENDA = 'Pós-Venda';

    protected $fillable = [
        'type',
        'days',
    ];

}
