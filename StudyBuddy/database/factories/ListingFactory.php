<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()

    {

        return [

            //

            'title' => $this->faker->sentence(),

            'tags' => 'laravel, api, backend',

            'number' =>$this->faker->companyEmail(),

            'location' =>$this->faker->city(),

            'description' =>$this->faker->paragraph(5),

        ];

    }
}
