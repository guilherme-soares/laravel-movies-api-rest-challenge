<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	/**
	 * The Review's attributes that are mass-assignable
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'description', 'rating', 'movie_id'];

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
