<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCatRequest extends FormRequest
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
        return [
            'name' => 'required|min:3|max:10',
            'age' => 'required|numeric',
            'breed_id' => 'required|numeric|exists:breeds,id', //exists:table,column
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bat buoc nhap ten',
            'name.min' => 'Ten it nhat 3 ki tu',
            'name.max' => 'Ten toi da 10 ki tu',
            'age.required' => 'Bat buoc nhap tuoi',
            'age.numeric' => 'Tuoi phai la so',
            'breed_id.required' => 'Bat buoc nhap breed id',
            'breed_id.numeric' => 'Breed id phai la so',
        ];
    }
}
