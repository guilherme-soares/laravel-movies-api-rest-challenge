<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Check if the users are being listed at user.list route.
     */
    public function test_can_list_users()
    {
        // Two new movies
        $users = User::factory()
            ->count(2)
            ->create()
            ->map(function ($user) {
                return $user->only(['name', 'email']);
            });

        // User that is navigating
        $user = User::first();

        // Tests
        $this->actingAs($user, 'api')
            ->get(route('user.list'))
            ->assertStatus(200)
            ->assertJsonFragment($users->get(0))
            ->assertJsonFragment($users->get(1))
            ->assertJsonStructure([
                '*' => ['name', 'email'],
            ]);
    }

    /**
     * Check if an user can be created.
     */
    public function test_can_create_user()
    {
        // New user (not saved)
        $newUser = User::factory()
            ->make()
            ->only(['name', 'email', 'password']);
        $newUser['password'] = 'testtest123';

        // Tests
        $this
            ->withHeader('accept', 'application/json')
            ->post(route('user.store'), $newUser)
            ->assertStatus(201)
            ->assertJson([
                'name'  => $newUser['name'],
                'email' => $newUser['email'],
            ]);

        // Checking database
        $this->assertDatabaseHas('users', [
            'name'  => $newUser['name'],
            'email' => $newUser['email'],
        ]);
    }
}
