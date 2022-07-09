<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->document_id = '1034762892';
        $user->name = 'Johny Alejandro';
        $user->lastname = 'Prieto Velasquez';
        $user->email = 'johny@mail.com';
        $user->mobile = '3137881165';
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->password = bcrypt('johny2020');
        $user->state = true;
        $user->save();
       	$user->roles()->attach('1');

        $user = new User;
        $user->document_id = '1032769722';
        $user->name = 'Fabian Alexander';
        $user->lastname = 'Zapata Gracia';
        $user->email = 'fabian@mail.com';
        $user->mobile = '3143666151';
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->password = bcrypt('fabian2020');
        $user->state = true;
        $user->save();
        $user->roles()->attach('1');

        // for ($i=0; $i < 10; $i++) {
        //     \App\Models\RoleUser::factory()->create([
        //         'user_id' => \App\Models\User::factory()->create()->id,
        //         'role_id' => 2
        //     ]);
        // }

        // for ($i=0; $i < 15; $i++) {
        //     \App\Models\RoleUser::factory()->create([
        //         'user_id' => \App\Models\User::factory()->create([
        //             'state' => false
        //         ])->id,
        //         'role_id' => 2
        //     ]);
        // }
    }
}
