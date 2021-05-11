<?php

namespace Database\Factories;

use App\Models\Taq;
use Illuminate\Database\Eloquent\Factories\Factory;

// IMPORTAMOS HELPER
use Illuminate\Support\Str;

class TaqFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Taq::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      // CREAMOS DATOS DE PRUEBAS

      $name = $this->faker->unique()->word(20);

        return [

            'name' => $name,
            'slug' => Str::slug($name)
        ];
    }























}
