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
