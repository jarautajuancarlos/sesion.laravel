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
          'name'=>'Victor Arana Flores',
          'email'=>'sacandofilo@gmail.com',
          'password'=>bcrypt('12345678')
        ]);

        User::factory(9)->create();

    }
}
