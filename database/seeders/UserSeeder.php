<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $patraoRole = Role::firstOrCreate(['name' => 'patrão']);
        $funcionarioRole = Role::firstOrCreate(['name' => 'funcionário']);

        $patrao = User::updateOrCreate(
            ['email' => 'patrao@example.com'],
            [
                'name' => 'Patrão',
                'password' => bcrypt('123'),
                'role' => 'patrão',
            ]
        );

        $patrao->syncRoles([$patraoRole]);

        $funcionario = User::updateOrCreate(
            ['email' => 'funcionario@example.com'],
            [
                'name' => 'Funcionário',
                'password' => bcrypt('123'),
                'role' => 'funcionário',
            ]
        );

        $funcionario->syncRoles([$funcionarioRole]);
    }
}
