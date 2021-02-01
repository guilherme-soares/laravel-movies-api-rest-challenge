<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	/**
	 * Model's attributes casts
	 *
	 * @var array
	 */
	protected $casts = [
		'stars' => 'array',
	];
}
