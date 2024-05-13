<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterielRequest extends FormRequest
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
            'id' =>'min:1|max:120',
            'nom'=>'required|min:3|max:120',
        'model'=>'required|min:3|max:40',
        'description'=>'min:3|max:255|nullable',
        'image'=>'required|image|mimes:png,jpg,jpeg',
        'quantite'=>'required|min:1|max:40',
        'barcode'=>'min:3|max:40|nullable',
        'date'=>'date_format:Y-m-d|nullable',
        'categories_id' =>'min:1|max:20|nullable' ,
        'marques_id'=>'min:1|max:20|nullable'
        ];
    }
}
