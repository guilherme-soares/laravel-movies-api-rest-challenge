<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select(['name', 'email'])->get();

		return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
