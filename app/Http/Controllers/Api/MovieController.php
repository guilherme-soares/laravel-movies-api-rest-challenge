<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     tags={"Movie"},
     *     summary="List all movies",
     *     description="List basic information of all movies",
     *     path="/movie",
     *     security={ {"bearer": {} }},
     *     @OA\Response(response="200", description="Successful operation"),
     *     @OA\Response(response="401", description="Unauthorized access")
     * ),
     */
    public function index()
    {
		$movies = Movie::select(['id', 'name', 'sinopse'])->get();

		return response()->json($movies);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     tags={"Movie"},
     *     summary="Find a movie",
     *     description="Returns a single movie",
     *     path="/movie/{movieId}",
     *     security={ {"bearer": {} }},
     *     @OA\Parameter(
     *          name="movieId",
     *          description="ID of movie to return",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Movie")
     *     ),
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized access"
     *     ),
     *     @OA\Response(response="404", description="Movie not found"),
     * ),
     */
    public function show($id)
    {
        try {
            $movie = Movie::findOrFail($id);

            return response()->json($movie);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Movie not found.'], 404);
        }
    }
}
