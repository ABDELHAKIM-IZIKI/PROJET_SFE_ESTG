<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegistre extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'users_id'=>'required|min:1|max:120',
            'materiels_id'=>'required|min:1|max:120',
            'etats_id' =>'required|min:1|max:120',
            'rapport'=>'min:3|max:120|nullable',
        'lieu'=>'required|min:3|max:40',
        'date'=>'required|date_format:Y-m-d',
      
        ];
    }
}
