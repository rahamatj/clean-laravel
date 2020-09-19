<?php

namespace App\Http\Requests\Todo;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'todo' => 'bail|required|string|max:255'
        ];
    }
}
