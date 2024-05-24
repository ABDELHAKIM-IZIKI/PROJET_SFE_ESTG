<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        'nom'=>'required|min:3|max:40',
        'roles_id'=>'required|min:1',
        'prenom'=>'required|min:3|max:40',
        'tel'=>'required|min:10',
        'division'=>'required|min:3|max:40',
        'service'=>'required|min:3|max:40',
        'email'=>'required|max:50|email',
        'password'=>'required|min:8|max:30',
        'Cpassword'=>'required|min:8|max:30',
        'adminpassword'=>'required|min:8|max:30'
        
        ];
    }
}
