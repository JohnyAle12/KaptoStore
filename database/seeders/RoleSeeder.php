<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Role::insert([
			[
				'name' => 'Administrator',
				'description' => 'Administrador con todos los privilegios en el sistema'
			],
			[
				'name' => 'Customer',
				'description' => 'Usuario de cliente con privilegio gestionados por el administrador'
			],
			[
				'name' => 'Provider',
				'description' => 'Usuario proveedor creación de usuarios'
			],
			[
				'name' => 'Agent',
				'description' => 'Usuario agentes creación de usuarios'
			]

		]);
    }
}
