<?php

use Illuminate\Database\Seeder;

class PermisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permision1 = \App\Domain\Permissions\Permission::create([
            'name' => 'permissao_total',
            'display_name' => 'Permissão Total',
            'description' => 'Pode-se fazer qualquer alteração nos dados',
        ]);

        $permision2 = \App\Domain\Permissions\Permission::create([
            'name' => 'permissao_parcial',
            'display_name' => 'Permissão Parcial',
            'description' => 'Permissão para alterar dados dos clientes e projetos, avançar nos passos e criar
            justificativas.',
        ]);

        $permision3 = \App\Domain\Permissions\Permission::create([
            'name' => 'sem_permissao',
            'display_name' => 'Sem Permissão',
            'description' => 'Permisão para avançar somente os passos do projeto e criar justificarivas.',
        ]);

        $permision1->save();
        $permision2->save();
        $permision3->save();
    }
}
