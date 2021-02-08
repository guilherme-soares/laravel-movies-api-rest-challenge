<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'    => $this->faker->text(10),
            'content'  => $this->faker->text(255),
            'rating'   => $this->faker->randomFloat(1, 0, 10),
            'movie_id' => Movie::factory()->create()->id,
            'user_id'  => User::factory()->create()->id,
        ];
    }
}
