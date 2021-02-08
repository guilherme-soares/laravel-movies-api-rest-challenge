<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *  @OA\Xml(name="Movie"),
 *  @OA\Property(property="id", type="integer"),
 *  @OA\Property(property="name", type="string"),
 *  @OA\Property(property="year", type="integer"),
 *  @OA\Property(property="synopsis", type="string"),
 *  @OA\Property(property="duration", type="string"),
 *  @OA\Property(property="directors", type="string"),
 *  @OA\Property(property="writers", type="string"),
 *  @OA\Property(property="stars", type="object"),
 *  @OA\Property(property="rating", type="number", example="8.5"),
 *  @OA\Property(property="image", type="string")
 * )
 */
class Movie extends Model
{
    use HasFactory;

    /**
     * Model's attributes casts
     *
     * @var array
     */
    protected $casts = [
        'stars' => 'array',
    ];

    /**
     * The attributes that should be hidden for arrays
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];
}
