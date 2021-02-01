<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		// Formatting results
		$reviews = Review::with('user:id,name')
			->get()
			->map(function($review) {
				return [
					'id' => $review['id'],
					'title' => $review['title'],
					'rating' => $review['rating'],
					'author' => $review['user'],
					'date' => $review['created_at'],
				];
			});

		return response()->json($reviews);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$review = Review::findOrFail($id);

        return response()->json($review);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		try {
			$review = new Review();
			$review->fill($request->all());

			// The author is the user that is submitting the request
			$review->user_id = auth('api')->user()->id;

			$review->save();

			return response()->json($review);
		} catch (\Exception $e) {
			return response()->json(['error' => 'Please, contact support.'], 500);
		}
    }
}