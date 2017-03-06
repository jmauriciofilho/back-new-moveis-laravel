<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(PermisionsTableSeeder::class);
         $this->call(StepsTableSeeder::class);
         $this->call(ClientsTableSeeder::class);
         $this->call(ProjectsTableSeeder::class);
         $this->call(JustificationsTableSeeder::class);
         // $this->call(ProjectsStepsTableSeeder::class);
    }
}
