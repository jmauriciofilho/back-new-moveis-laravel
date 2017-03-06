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
            'user_id' => 3,
            'step_id' => 3,
            'project_id' => 2,
            'date' => '03/02/2017',
            'text' => 'Atrasou pq sim!!!!',
        ]);

        $justification2 = \App\Domain\Justifications\Justifications::create([
            'user_id' => 4,
            'step_id' => 8,
            'project_id' => 1,
            'date' => '03/02/2017',
            'text' => 'Atrasou pq sim!!!!',
        ]);

        $justification1->save();
        $justification2->save();

//        factory('App\Domain\Justifications\Justifications')->create();
    }
}
