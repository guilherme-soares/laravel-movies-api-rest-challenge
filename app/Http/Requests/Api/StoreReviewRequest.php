<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'       => 'required|max:255',
            'description' => 'required|max:255',
            'rating'      => 'required|numeric|between:1,10',
            'movie_id'    => 'required|exists:movies,id',
        ];
    }


    /**
     * Get messages for validation errors.
     * To return an JSON array with errors, the request must include the header 'Accept: application/json'
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.*'       => 'Please, type in a valid title (max 255 characters).',
            'description.*' => 'Please, type in a valid description (max 255 characters).',
            'rating.*'      => 'Please, type in a rating between 1 and 10.',
            'movie_id.*'    => 'Please, select a movie.',
        ];
    }
}
