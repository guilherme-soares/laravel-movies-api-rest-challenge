<?php

namespace Tests\Feature\Api;

use App\Models\Review;
use App\Models\User;
use App\Models\Movie;
use Tests\TestCase;

class ReviewTest extends TestCase
{
    /**
     * Check if the reviews are being listed at review.list route.
     */
    public function test_can_list_reviews()
    {
        // Two new movies
        $reviews = Review::factory()
            ->count(2)
            ->create()
            ->map(function ($review) {
                return [
                    'id'     => $review['id'],
                    'title'  => $review['title'],
                    'rating' => $review['rating'],
                    'author' => $review['user']->only(['id', 'name']),
                    'date'   => $review['created_at'],
                ];
            });

        // User that is navigating
        $user = User::factory()->create();

        // Tests
        $this->actingAs($user, 'api')
            ->get(route('review.list'))
            ->assertStatus(200)
            ->assertJsonFragment($reviews->get(0))
            ->assertJsonFragment($reviews->get(1))
            ->assertJsonStructure([
                '*' => ['title', 'rating', 'date', 'author' => ['id', 'name']],
            ]);
    }

    /**
     * Check if full review info is retrieved at review.show route.
     */
    public function test_can_show_review()
    {
        // Creating new movie
        $review = Review::factory()
            ->create();

        // User that is navigating
        $user = User::factory()->create();

        // Test
        $this->actingAs($user, 'api')
            ->get(route('review.show', $review->id))
            ->assertStatus(200)
            ->assertJsonFragment([
                'id'      => $review->id,
                'title'   => $review->title,
                'content' => $review->content
            ]);
    }

    /**
     * Check if a review can be created.
     */
    public function test_can_create_review()
    {
        // New user (not saved)
        $newReview = Review::factory()
            ->make()
            ->only(['title', 'content', 'rating', 'movie_id']);

        // User that is navigating
        $user = User::factory()->create();

        // Tests
        $this->actingAs($user, 'api')
            ->withHeader('accept', 'application/json')
            ->post(route('review.store', $newReview))
            ->assertStatus(201)
            ->assertJson([
                'title'    => $newReview['title'],
                'content'  => $newReview['content'],
                'rating'   => $newReview['rating'],
                'movie_id' => $newReview['movie_id'],
            ]);

        // Checking database
        $this->assertDatabaseHas('reviews', [
            'title'    => $newReview['title'],
            'content'  => $newReview['content'],
            'rating'   => $newReview['rating'],
            'movie_id' => $newReview['movie_id'],
        ]);
    }
}
