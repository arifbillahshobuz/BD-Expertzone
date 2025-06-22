<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileUpdateRequest extends FormRequest
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
            'gender' => 'required|in:male,female',
            'blood_group' => 'required|string|max:10|in:A+,A-,B+,B-,O+,O-,AB+,AB-',
            'language' => 'required|string|max:10',
            'relationship' => 'required|in:married,unmarried',
            'bio' => 'required|string|max:255',
            'education' => 'required|string|max:50',
            'date_of_birth' => 'required|date',
            'hobby' => 'required|string|max:50',
            'present_address' => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255',
            'designation_id' => 'required|exists:designations,id',
            'cv' => 'required|file|mimes:pdf|max:2048',
        ];
    }
}
