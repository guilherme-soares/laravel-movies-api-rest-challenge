<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *     tags={"Auth"},
     *     summary="Logs user into the system",
     *     description="Used fields are Email and password",
     *     path="/login",
     *     @OA\RequestBody(
     *          required=true,
     *          description="User credentials",
     *          @OA\JsonContent(
     *              @OA\Property(property="email", type="string"),
     *              @OA\Property(property="password", type="string"),
     *          ),
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="Successful login",
     *          @OA\JsonContent(
     *              @OA\Property(property="access_token", type="string"),
     *              @OA\Property(property="token_type", type="string"),
     *              @OA\Property(property="expires_in", type="integer"),
     *          ),
     *     ),
     *     @OA\Response(
     *          response="401",
     *          description="Invalid credentials",
     *     )
     * ),
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *     tags={"Auth"},
     *     summary="Logs out current logged in user",
     *     description="",
     *     path="/logout",
     *     security={ {"bearer": {} }},
     *     @OA\Response(response="200",description="Successful operation"),
     *     @OA\Response(response="401",description="Unauthenticated",),
     * ),
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
