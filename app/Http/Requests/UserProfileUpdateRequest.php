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
        $user = auth()->user();

        return [
            'name' => 'sometimes|string|max:255',
            'username' => 'sometimes|string|max:255|unique:users,username,' . $user->id,
            'gender' => 'nullable|in:male,female',
            'blood_group' => 'nullable|string|max:10|in:A+,A-,B+,B-,O+,O-,AB+,AB-',
            'language' => 'nullable|string|max:10',
            'relationship' => 'nullable|in:married,unmarried',
            'bio' => 'nullable|string|max:1000',
            'education' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'hobby' => 'nullable|string|max:255',
            'present_address' => 'nullable|string|max:500',
            'permanent_address' => 'nullable|string|max:500',
            'designation_id' => 'nullable|exists:designations,id',
            'cv' => 'nullable|file|mimes:pdf|max:5120',
            'avatar' => 'nullable|image|max:2048',
        ];
    }
}
