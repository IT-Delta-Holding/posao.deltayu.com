<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class LegalEntityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $factory->define(App\LegalEntity::class, function (Faker\Generator $faker) {
            return [
                'name' => $faker->name,
                'detail' => $faker->detail,
            ];
        });
    }
}
