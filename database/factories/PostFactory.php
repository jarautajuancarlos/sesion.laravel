<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

// IMPORTAMOS HELPER
use Illuminate\Support\Str;

// IMPORTAMOS MODELO Category
use App\Models\Category;

// IMPORTAMOS MODELO USER
use App\Models\User;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

      //CREAMOS DATOS DE PRUEBAS
      $name = $this->faker->unique()->sentence();

        return [

          'name' => $name,
          'slug'=> Str::slug($name),
          'extract'=> $this->faker->text(250),
          'body' => $this->faker->text(2000),
          'status' => $this->faker->randomElement([1,2]),
          'category_id' => Category::all()->random()->id,
          'user_id' => User::all()->random()->id

        ];
    }






















}
