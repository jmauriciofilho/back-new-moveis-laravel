<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $project1 = \App\Domain\Projects\Projects::create([
            'description' => 'Criando uma cozinha',
            'start_project' => '2017-02-02',
            'completed' => false,
            'client_id' => 1,
        ]);
        $project1->steps()->sync(App\Domain\Steps\Steps::all());
        $project1->save();

        $project2 = \App\Domain\Projects\Projects::create([
            'description' => 'Reforma de sofá',
            'start_project' => '2017-02-05',
            'completed' => false,
            'client_id' => 2,
        ]);
        $project2->steps()->sync(App\Domain\Steps\Steps::all());
        $project2->save();

        $project3 = \App\Domain\Projects\Projects::create([
            'description' => 'Fazer quarto de casal',
            'start_project' => '2017-01-02',
            'completed' => false,
            'client_id' => 3,
        ]);
        $project3->steps()->sync(App\Domain\Steps\Steps::all());
        $project3->save();

        $project4 = \App\Domain\Projects\Projects::create([
            'description' => 'Guarda-roupa',
            'start_project' => '2017-01-12',
            'completed' => false,
            'client_id' => 1,
        ]);
        $project4->steps()->sync(App\Domain\Steps\Steps::all());
        $project4->save();
    }
}
