<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           //
        ];
    }
}
 // // For Testing
//  'title' => $this->faker->sentence(),
//  'tags' => 'laravel, api, backend',
//  'company' => $this->faker->company(),
//  'logo' =>$this->faker->imageUrl(),
//  'email' => $this->faker->companyEmail(),
//  'website' => $this->faker->url(),
//  'location' => $this->faker->city(),
//  'description' => $this->faker->paragraph(1),