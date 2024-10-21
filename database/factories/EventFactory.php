<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('-30 days', '+30 days');
        $endDate = $this->faker->dateTimeBetween($startDate, $startDate->format('Y-m-d') . ' +7 days');

        return [
            'name' => $this->faker->sentence(3),
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate->format('Y-m-d'),
            'description' => $this->faker->paragraph,
            'image_url' => $this->faker->imageUrl(640, 480, 'event', true),
        ];
    }
}
