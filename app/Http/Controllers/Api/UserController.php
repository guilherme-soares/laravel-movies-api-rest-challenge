<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreUserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     tags={"User"},
     *     summary="List all users",
     *     description="List name and email of all users",
     *     path="/users",
     *     security={ {"bearer": {} }},
     *     @OA\Response(response="200", description="Successful operation"),
     *     @OA\Response(response="401", description="Unauthorized access")
     * ),
     */
    public function index()
    {
        $users = User::select(['name', 'email'])->get();

		return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Api\StoreUserRequest $request
     * @return \Illuminate\Http\Response
     *
     * @OA\Post(
     *     tags={"User"},
     *     summary="Add a new user",
     *     description="",
     *     path="/users",
     *     @OA\RequestBody(
     *          required=true,
     *          description="User object that needs to be added",
     *          @OA\JsonContent(ref="#/components/schemas/StoreUserRequest"),
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/User"),
     *     ),
     *     @OA\Response(
     *          response="422",
     *          description="Validation errors",
     *     )
     * ),
     */
    public function store(StoreUserRequest $request)
    {
		$user = new User();
		$user->fill($request->all());

		try {
			$user->save();

			return response()->json($user);
		} catch (\Exception $e) {
			return response()->json(['error' => 'Please, contact support.'], 500);
		}
    }
}
