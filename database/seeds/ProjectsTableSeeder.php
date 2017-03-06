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
            'start_project' => '02/02/2017',
            'completed' => false,
            'client_id' => 1,
        ]);
        $project1->steps()->sync(App\Domain\Steps\Steps::all());
        $project1->save();

        $project2 = \App\Domain\Projects\Projects::create([
            'description' => 'Reforma sofa',
            'start_project' => '05/02/2017',
            'completed' => false,
            'client_id' => 2,
        ]);
        $project2->steps()->sync(App\Domain\Steps\Steps::all());
        $project2->save();

        $project3 = \App\Domain\Projects\Projects::create([
            'description' => 'Fazer Quarto de casal',
            'start_project' => '02/01/2017',
            'completed' => false,
            'client_id' => 3,
        ]);
        $project3->steps()->sync(App\Domain\Steps\Steps::all());
        $project3->save();

        $project4 = \App\Domain\Projects\Projects::create([
            'description' => 'Quardaroupa',
            'start_project' => '12/01/2017',
            'completed' => false,
            'client_id' => 1,
        ]);
        $project4->steps()->sync(App\Domain\Steps\Steps::all());
        $project4->save();
    }
}
