<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *  @OA\Xml(name="Review"),
 *  @OA\Property(property="id", type="integer"),
 *  @OA\Property(property="title", type="string"),
 *  @OA\Property(property="content", type="string"),
 *  @OA\Property(property="rating", type="number", example="8.5"),
 *  @OA\Property(property="movie_id", type="integer"),
 *  @OA\Property(property="user_id", type="integer")
 * )
 */
class Review extends Model
{
    use HasFactory;

	/**
	 * The Review's attributes that are mass-assignable
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'content', 'rating', 'movie_id'];

    /**
     * The attributes that should be hidden for arrays
     *
     * @var array
     */
	protected $hidden = ['created_at', 'updated_at'];

	/**
	 * Getting author's user.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Getting the related movie.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function movie()
	{
		return $this->belongsTo(Movie::class);
	}

	/**
	 * Formatting the rating value
	 *
	 * @param mixed $value
	 * @return void
	 */
	public function getRatingAttribute($value)
	{
		return number_format($this->attributes['rating'], 1);
	}
}
