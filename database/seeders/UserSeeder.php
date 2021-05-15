<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// IMPORTAMOS MODEL USER
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name'=>'Juan Carlos Jarauta',
          'email'=>'sacandofilo@gmail.com',
          'password'=>bcrypt('porelmomento')
        ])->assignRole('Admin');

        User::factory(9)->create();

    }
}
