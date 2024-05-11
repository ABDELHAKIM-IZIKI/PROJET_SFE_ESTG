<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequestUpdate extends FormRequest
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
                'id' =>'max:400',
                'nom'=>'required|min:3|max:40',
                'roles_id'=>'required|min:1',
                'prenom'=>'required|min:3|max:40',
                'tel'=>'min:10',
                'division'=>'required|min:3|max:40',
                'service'=>'required|min:3|max:40',
                'email'=>'required|min:3|max:40|email',
                'password'=>'min:8|max:30|nullable',
                'Cpassword'=>'min:8|max:30|nullable'
                ];
        
    }
}
