<?php

namespace Tests\Feature\Api;

use App\Models\Movie;
use App\Models\User;
use Tests\TestCase;

class MovieTest extends TestCase
{
    /**
     * Check if the movies are being listed at movie.list route.
     */
    public function test_can_list_movies()
    {
        // Two new movies
        $movies = Movie::factory()
            ->count(2)
            ->create()
            ->map(function ($movie) {
                return $movie->only(['id', 'name', 'synopsis']);
            });

        // User that is navigating
        $user = User::factory()->create();

        // Tests
        $this->actingAs($user, 'api')
            ->get(route('movie.list'))
            ->assertStatus(200)
            ->assertJsonFragment($movies->get(0))
            ->assertJsonFragment($movies->get(1))
            ->assertJsonStructure([
                '*' => ['id', 'name', 'synopsis'],
            ]);
    }

    /**
     * Check if full movie info is retrieved at movie.show route.
     */
    public function test_can_show_movie()
    {
        // Creating new movie
        $movie = Movie::factory()->create();

        // User that is navigating
        $user = User::factory()->create();

        // Test
        $this->actingAs($user, 'api')
            ->get(route('movie.show', $movie->id))
            ->assertStatus(200)
            ->assertJson([
                'id'    => $movie->id,
                'name'  => $movie->name,
                'stars' => $movie->stars
            ]);
    }
}
