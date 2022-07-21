<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Transaction::insert([
            [
				'name' => 'Administrar usuarios',
				'category' => 'Administración usuarios',
                'route'  => 'admin.users'
            ],
            [
				'name' => 'Crear usuario',
				'category' => 'Administración usuarios',
                'route'  => 'user.create'
            ],
            [
				'name' => 'Asignar perfil',
				'category' => 'Administración usuarios',
                'route'  => 'assign.profile'
            ],
            [
				'name' => 'Crear perfil',
				'category' => 'Administración usuarios',
                'route'  => 'create.profile'
            ],
            [
				'name' => 'Administrar perfiles',
				'category' => 'Administración usuarios',
                'route'  => 'admin.profile'
            ],
			[
				'name' => 'Condiciones acuerdo comercial',
				'category' => 'Control de proveedores',
                'route'  => 'conditions.comercial'
            ],
            [
				'name' => 'Administrar mis productos',
				'category' => 'Control de proveedores',
                'route'  => 'admin.products'
            ],
            [
				'name' => 'Políticas de envio y devoluciones',
				'category' => 'Control de proveedores',
                'route'  => 'delivery.policies'
            ],
		]);
    }
}
