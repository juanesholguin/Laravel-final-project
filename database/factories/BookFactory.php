<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fakerFileName = $this->faker->image(
            storage_path('app/public/images/cover_image'),
        );

        return [
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'cover_image' => 'images/cover_image/' . basename($fakerFileName),
            'price' => $this->faker->randomFloat(2, 5, 100),
            'published_at' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'category_id' => Category::inRandomOrder()->first()->id
        ];
    }
}
