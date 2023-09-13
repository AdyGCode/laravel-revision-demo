<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return true; // setting true allows ANYONE to save new statuses
        return !is_null(auth()->user());  // only allow authenticated users
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:5',
                'max:32',
                'unique:statuses,name',
            ],
            'description'=> [
                'nullable',
                'min:10',
                'max:1024',
            ],
        ];
    }
}
