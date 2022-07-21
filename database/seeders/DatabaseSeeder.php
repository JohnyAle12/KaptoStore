<?php

namespace Database\Seeders;

use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            TransactionSeed::class
        ]);

        // \App\Models\Request::factory()->times(10)->create();
        // \App\Models\Investment::factory()->times(25)->create();
        // \App\Models\Balance::factory()->times(30)->create();
    }
}
