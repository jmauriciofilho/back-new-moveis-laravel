<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = new \App\Domain\Roles\Roles();
        $roleAdmin->name         = 'admin';
        $roleAdmin->display_name = 'Administrator';
        $roleAdmin->description  = 'Full Access';
        $roleAdmin->save();

        $userAdmin = \App\Domain\Users\User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('default'),
            'activated' => true,
        ]);

        $userAdmin->attachRole($roleAdmin);
    }
}
