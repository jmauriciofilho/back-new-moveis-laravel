<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client1 = \App\Domain\Clients\Clients::create([
            'name' => 'José Pereira',
            'gender' => 'Masculino',
            'cpf' => '02343455432',
            'email'=> 'jose@jose.com',
            'phone'=> 999786775,
        ]);

        $client2 = \App\Domain\Clients\Clients::create([
            'name' => 'Paulo José',
            'gender' => 'Masculino',
            'cpf' => '04378276434',
            'email'=> 'paulo@paulo.com',
            'phone'=> 34563245,
        ]);

        $client3 = \App\Domain\Clients\Clients::create([
            'name' => 'Maria de Nazaré',
            'gender' => 'Feminino',
            'cpf' => '04583839493',
            'email'=> 'maria@maria.com',
            'phone'=> 34345656,
        ]);

        $client1->save();
        $client2->save();
        $client3->save();


//        factory('App\Domain\Clients\Clients', 3)->create();
    }
}
