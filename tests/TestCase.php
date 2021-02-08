<?php

namespace Tests;

use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseTransactions;

    /**
     * Set the currently logged in user for the application.
     *
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     * @param string|null $driver
     * @return $this
     */
    public function actingAs($user, $driver = null)
    {
        if ($driver == 'api') {
            $token = JWTAuth::fromUser($user);
            $this->withHeader('Authorization', "Bearer {$token}");
        }

        parent::actingAs($user);

        return $this;
    }
}
