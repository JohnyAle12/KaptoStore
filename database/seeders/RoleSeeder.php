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
				'name' => 'Super Usuario',
				'description' => 'Administrador con todos los privilegios en el sistema'
			],
			[
				'name' => 'Asistente Portal',
				'description' => 'Usuario de asistente con privilegio gestionados por el administrador'
			],
			[
				'name' => 'Consulta Proveedor',
				'description' => 'Usuario de consulta con privilegio gestionados por el administrador'
			],
			[
				'name' => 'Gestor Comercial',
				'description' => 'Usuario de gestor con privilegio gestionados por el administrador'
			],
			[
				'name' => 'Otro',
				'description' => 'Usuario sin rol específico puede ser gestionados por el administrador'
			]

		]);
    }
}
