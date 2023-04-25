<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CovidData>
 */
class CovidDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('ka_GE');
        return [
            'name' => [
                'en' => $faker->word(),
                'ka' => $faker->realText(10),
            ],
            'code' => $faker->word(),
            'confirmed' => $this->faker->numberBetween(0, 100000),
            'deaths' => $this->faker->numberBetween(0, 5000),
            'recovered' => $this->faker->numberBetween(0, 90000),
        ];
    }
}
