<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// IMPORTAMOS MODELOS
use App\Models\Category;
use App\Models\Taq;
use App\Models\Post;

// IMPORTAMOS STORAGE
use Illuminate\Support\Facades\Storage;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // ELIMINAMOS ARCHIVOS IMG ENTRE MIGRATE:REFRESH
        Storage::deleteDirectory('posts');
        // CREAMOS CARPETA PARA IMG
        Storage::makeDirectory('posts');
        // LLAMAMOS AL USERSEEDER
        $this->call(UserSeeder::class);

        Category::factory(4)->create();
        Taq::factory(8)->create();
        Post::factory(100)->create();

        $this->call(PostSeeder::class);
    }
}
