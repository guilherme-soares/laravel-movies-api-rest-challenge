<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreReviewRequest;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     tags={"Review"},
     *     summary="List basic information of all reviews",
     *     description="",
     *     path="/review",
     *     security={ {"bearer": {} }},
     *     @OA\Response(response="200", description="Successful operation"),
     *     @OA\Response(response="401", description="Unauthorized access")
     * ),
     */
    public function index()
    {
        // Formatting results
        $reviews = Review::with('user:id,name')
            ->get()
            ->map(function ($review) {
                return [
                    'id'     => $review['id'],
                    'title'  => $review['title'],
                    'rating' => $review['rating'],
                    'author' => $review['user'],
                    'date'   => $review['created_at'],
                ];
            });

        return response()->json($reviews);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     tags={"Review"},
     *     summary="Find a review",
     *     description="Returns a single review",
     *     path="/review/{reviewId}",
     *     security={ {"bearer": {} }},
     *     @OA\Parameter(
     *          name="reviewId",
     *          description="ID of review to return",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Review")
     *     ),
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized access"
     *     ),
     *     @OA\Response(response="404", description="Review not found"),
     * ),
     */
    public function show($id)
    {
        try {
            $review = Review::findOrFail($id);

            return response()->json($review);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Review not found.'], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Api\StoreReviewRequest $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *     tags={"Review"},
     *     summary="Add a new review",
     *     description="",
     *     path="/review",
     *     security={ {"bearer": {} }},
     *     @OA\RequestBody(
     *          required=true,
     *          description="Review object that needs to be added",
     *          @OA\JsonContent(ref="#/components/schemas/StoreReviewRequest"),
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Review"),
     *     ),
     *     @OA\Response(
     *          response="422",
     *          description="Validation errors",
     *     )
     * ),
     */
    public function store(StoreReviewRequest $request)
    {
        try {
            $review = new Review();
            $review->fill($request->all());

            // The author is the user that is submitting the request
            $review->user_id = auth('api')->user()->id;

            $review->save();

            return response()->json($review, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Please, contact support.'], 500);
        }
    }
}
