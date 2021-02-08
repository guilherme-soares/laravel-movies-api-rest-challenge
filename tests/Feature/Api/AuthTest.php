<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * Test if private routes are protected.
     */
    public function test_are_privates_routes_protected()
    {
        // Routes to check
        $privateRoutes = [
            ['get', 'movie.list'],
            ['get', 'movie.show', 1],
            ['get', 'review.list'],
            ['get', 'review.show', 1],
            ['post', 'review.store'],
            ['get', 'user.list'],
            ['get', 'auth.logout'],
        ];

        // Asserting it returns 401
        foreach ($privateRoutes as $route) {
            @list($method, $route, $param) = $route;

            $this->withHeader('accept', 'application/json')
                ->{$method}(route($route, $param))
                ->assertStatus(401);
        }
    }

    /**
     * Check if login is working.
     */
    public function test_is_login_working()
    {
        // New user
        $user = User::factory()->make();
        $user->password = 'testtest137';
        $user->save();

        // Testing w/ wrong data
        $this
            ->postJson(route('auth.login'), ['email' => $user->email, 'password' => '123'])
            ->assertStatus(401);

        // Testing w/ correct data
        $response = $this
            ->postJson(route('auth.login'), ['email' => $user->email, 'password' => 'testtest137'])
            ->assertStatus(200)
            ->getData();

        // Trying to access protected route w/ token provided
        $token = $response->access_token;
        $this
            ->withHeader('Authorization', "Bearer {$token}")
            ->get(route('movie.list'))
            ->assertStatus(200);
    }

    /**
     * Check if logout is invalidating access token.
     */
    public function test_is_logout_working()
    {
        // User to try to logout
        $user = User::factory()->make();
        $user->password = 'test123test';
        $user->save();

        // Logging in
        $response = $this
            ->postJson(route('auth.login'), ['email' => $user->email, 'password' => 'test123test'])
            ->assertStatus(200)
            ->getData();

        // Trying to logout
        $token = $response->access_token;
        $this->withHeader('Authorization', "Bearer {$token}")
            ->get(route('auth.logout'))
            ->assertStatus(200);

        // Checking if token was invalidated
        $this->withHeader('Authorization', "Bearer {$token}")
            ->get(route('movie.list'))
            ->assertStatus(401);
    }
}
