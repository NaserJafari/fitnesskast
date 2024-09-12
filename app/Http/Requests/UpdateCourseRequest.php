<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'max_spot' => 'required|numeric',
        ];
    }

    // Functie om custom error messages te maken
    public function messages(): array
    {
        return [
            'name.required' => 'De naam is verplicht',
            'name.string' => 'De naam mag geen nummbers bevatten of tekens',
            'description.required' => 'De beschrijving is verplicht',
            'description.string' => 'De beschrijving mag geen nummers bevatten of tekens',
            'max_spot.required' => 'Het aantal plekken is verplicht',
            'max_spot.numeric' => 'Het aantal plekken moet een getal zijn',
        ];
    }
}
