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
            'type' => \App\Domain\Steps\Steps::MEDIACAODEPROJETOS,
            'days' => 10,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => \App\Domain\Steps\Steps::APRESENTACAODOPROJETO,
            'days' => 9,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => \App\Domain\Steps\Steps::FECHAMENTO,
            'days' => 5,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => \App\Domain\Steps\Steps::FINANCEIRO,
            'days' => 2,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => \App\Domain\Steps\Steps::AGENDAMENTODECONFERENCIADOPROJETO,
            'days' => 9,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => \App\Domain\Steps\Steps::PASTATECNICA,
            'days' => 9,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => \App\Domain\Steps\Steps::ENVIOPARAAFABRICA,
            'days' => 2,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => \App\Domain\Steps\Steps::PRODUCAO,
            'days' => 45,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => \App\Domain\Steps\Steps::LOGISTICA,
            'days' => 9,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => \App\Domain\Steps\Steps::MONTAGEM,
            'days' => 5,
        ]);

        \App\Domain\Steps\Steps::create([
            'type' => \App\Domain\Steps\Steps::POSVENDA,
            'days' => 2,
        ]);
    }
}
