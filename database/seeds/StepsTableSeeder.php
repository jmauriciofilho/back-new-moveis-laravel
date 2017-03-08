<?php

use Illuminate\Database\Seeder;

class StepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Domain\Steps\Steps::create([
            'type' => \App\Domain\Steps\Steps::ATENDIMENTO,
            'days' => 1,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => 'Medição de Projeto',
            'days' => 10,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => 'Apresentação do Projeto',
            'days' => 9,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => 'Fechamento',
            'days' => 5,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => 'Financeiro',
            'days' => 2,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => 'Agendamento de conferência do projeto',
            'days' => 9,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => 'Pasta Técnica',
            'days' => 9,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => 'Envio para a Fábrica',
            'days' => 2,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => 'Produção',
            'days' => 45,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => 'Logística',
            'days' => 9,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => 'Montagem',
            'days' => 5,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => 'Pós Venda',
            'days' => 2,
        ]);
    }
}
