<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractstatusRequest extends FormRequest
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
                    'name' => 'required|string|max:255',
                    'order' => 'number'
                ];
            case 'PUT':
                return [
                    'name' => 'sometimes|required|string|max:255',
                    'order' => 'sometimes|number'
                ];
            default:
                return [];
        }
    }
}
