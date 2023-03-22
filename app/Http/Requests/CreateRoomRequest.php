<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class CreateRoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'room_number' => ['required', 'numeric'],
            'room_name' => ['nullable', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'capacity' => ['nullable', 'numeric'],
            'equipment' => ['nullable', 'string'],
            'status' => ['string'],

            'images' => ['required'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif'],
        ];
    }
}
