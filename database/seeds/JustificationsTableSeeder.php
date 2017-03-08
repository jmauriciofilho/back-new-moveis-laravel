<?php

use Illuminate\Database\Seeder;

class JustificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $justification1 = \App\Domain\Justifications\Justifications::create([
            'user_id' => 1,
            'step_id' => 3,
            'project_id' => 2,
            'date' => '2017-02-03',
            'text' => 'Testando aplicação.',
        ]);

        $justification2 = \App\Domain\Justifications\Justifications::create([
            'user_id' => 1,
            'step_id' => 8,
            'project_id' => 1,
            'date' => '2017-02-05',
            'text' => 'Teste de justificativas.',
        ]);

        $justification1->save();
        $justification2->save();

//        factory('App\Domain\Justifications\Justifications')->create();
    }
}
