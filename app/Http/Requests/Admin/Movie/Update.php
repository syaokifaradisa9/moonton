<?php

namespace App\Http\Requests\Admin\Movie;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::user()->hasRole('admin');
    }

    public function rules(): array
    {
        return [
            'name' => 'nullable|unique:movies,name,' . $this->movie->id,
            'category' => 'nullable',
            'video_url' => 'nullable|url',
            'thumbnail' => 'nullable|image',
            'rating' => 'nullable|numeric|min:0|max:5',
            'is_featured' => 'nullable|boolean',
        ];
    }
}
