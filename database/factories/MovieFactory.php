<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        for ($i = 0; $i < $this->faker->numberBetween(1, 5); $i++) {
            $stars[] = ['name' => $this->faker->name];
        }

        return [
            'name'      => $this->faker->company,
            'year'      => $this->faker->year,
            'synopsis'  => $this->faker->text,
            'duration'  => $this->faker->numberBetween(0, 3) . 'h' . $this->faker->numberBetween(10, 59),
            'directors' => $this->faker->name,
            'writers'   => $this->faker->name,
            'stars'     => $stars,
            'rating'    => $this->faker->randomFloat(1, 0, 10),
            'image'     => $this->faker->imageUrl(),
        ];
    }
}
