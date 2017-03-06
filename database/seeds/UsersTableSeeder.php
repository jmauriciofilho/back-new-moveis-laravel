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
        $roleAdmin = new \App\Domain\Roles\Role();
        $roleAdmin->name         = 'administrador';
        $roleAdmin->display_name = 'Administrator';
        $roleAdmin->description  = 'Full Access';
        $roleAdmin->save();

        $roleConsust = new \App\Domain\Roles\Role();
        $roleConsust->name         = 'consultores';
        $roleConsust->display_name = 'Consultores';
        $roleConsust->description  = 'Adiciona projetos e clientes e faz acompanhamento de passos do projeto.';
        $roleConsust->save();

        $roleGerentF = new \App\Domain\Roles\Role();
        $roleGerentF->name         = 'gerente_financeiro';
        $roleGerentF->display_name = 'Gerente Financeiro';
        $roleGerentF->description  = 'Faz acompanhamento de passos do projeto.';
        $roleGerentF->save();

        $roleConfer = new \App\Domain\Roles\Role();
        $roleConfer->name         = 'conferente';
        $roleConfer->display_name = 'Conferente';
        $roleConfer->description  = 'Faz acompanhamento de passos do projeto.';
        $roleConfer->save();

        $roleGerentFa = new \App\Domain\Roles\Role();
        $roleGerentFa->name         = 'gerente_de_fábrica';
        $roleGerentFa->display_name = 'Gerente de fábrica';
        $roleGerentFa->description  = 'Faz acompanhamento de passos do projeto.';
        $roleGerentFa->save();

        $roleGerentP = new \App\Domain\Roles\Role();
        $roleGerentP->name         = 'gerente_de_pós_venda';
        $roleGerentP->display_name = 'Gerente de Pós venda';
        $roleGerentP->description  = 'Faz acompanhamento de passos do projeto.';
        $roleGerentP->save();

        $userAdmin = \App\Domain\Users\User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('default'),
            'activated' => true,
        ]);

        $userConsult = \App\Domain\Users\User::create([
            'name' => 'Consultores',
            'email' => 'consult@consult.com',
            'password' => bcrypt('consult'),
            'activated' => true,
        ]);

        $userConsult2 = \App\Domain\Users\User::create([
            'name' => 'Consultores2',
            'email' => 'consult2@consultor.com',
            'password' => bcrypt('consult2'),
            'activated' => true,
        ]);

        $userGerentF = \App\Domain\Users\User::create([
            'name' => 'Gerente Financeiro',
            'email' => 'gerentf@gerent.com',
            'password' => bcrypt('gerentf'),
            'activated' => true,
        ]);

        $userConfer = \App\Domain\Users\User::create([
            'name' => 'Conferente',
            'email' => 'confer@confer.com',
            'password' => bcrypt('confer'),
            'activated' => true,
        ]);

        $userGerentFa = \App\Domain\Users\User::create([
            'name' => 'Gerente de fábrica',
            'email' => 'gerentfa@gerentfa.com',
            'password' => bcrypt('default'),
            'activated' => true,
        ]);

        $userGerentP = \App\Domain\Users\User::create([
            'name' => 'Gerente de Pós venda',
            'email' => 'gerentp@gerentp.com',
            'password' => bcrypt('gerentp'),
            'activated' => true,
        ]);

        $userAdmin->attachRole($roleAdmin);
        $userConsult->attachRole($roleConsust);
        $userConsult2->attachRole($roleConsust);
        $userGerentF->attachRole($roleGerentF);
        $userConfer->attachRole($roleConfer);
        $userGerentFa->attachRole($roleGerentFa);
        $userGerentP->attachRole($roleGerentP);
    }
}
