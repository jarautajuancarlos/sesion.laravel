<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

// IMPORTAMOS HELPER
use Illuminate\Support\Str;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

      // CREAMOS DATOS DE PRUEBAS

        return [

          'url' =>'posts/' . $this->faker->image('public/storage/posts', 640, 480, null, false)

        ];
    }
























}
