<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContributorRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'user.name' => 'required|string|max:255',
                    'user.email' => 'required|string|email|unique:users,email',
                    'user.password' => 'required|string|min:8|confirmed',
                    'name' => 'required|string|max:255',
                    'description' => 'string',
                    'avatar' => 'string',
                    'cv_url' => 'string',
                    'phone' => 'string',
                    'zip' => 'string',
                    'city' => 'string',
                    'address' => 'string',
                    'skills' => ''
                ];
            case 'PUT':
                return [
                    'user.name' => 'sometimes|required|string|max:255',
                    'user.email' => 'sometimes|required|string|email|unique:users,email',
                    'user.password' => 'sometimes|required|string|min:8|confirmed',
                    'name' => 'sometimes|required|string|max:255',
                    'description' => 'string',
                    'avatar' => 'string',
                    'cv_url' => 'string',
                    'phone' => 'string',
                    'zip' => 'string',
                    'city' => 'string',
                    'address' => 'string',
                    'skills' => ''
                ];
            default:
                return [];
        }
    }
}
