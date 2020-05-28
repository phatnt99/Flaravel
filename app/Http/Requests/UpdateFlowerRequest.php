<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFlowerRequest extends FormRequest
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
            //
            'catalog_id' => 'exists:flower_catalogs,id',
            'name' => 'sometimes|required|unique:flowers,name,'.$this->flower,
            'price' => 'min:1|max:1000',
            'image_link' => 'nullable|url',
            'color' => [
                Rule::in(['red', 'yellow', 'blue'])
            ],
        ];
    }

    public function messages()
    {
        return [
            'catalog_id.required' => ':attribute cannot be empty',
            'catalog_id.exists' => ':attribute doesnt exists in catalog table',
            'name.required' => ':attribute cannot be empty',
            'name.unique' => ':attribute already exists in flower table',
            'price.max' => ':attribute must be lower than 1000',
            'price.min' => ':attribute must be greater than 1',
            'image_link.required' => ':attribute cannot be empty',
            'image_link.url' => ':attribute must be a url format',
            'color.in' => ':attribute must be in list:red, yellow, blue',
        ];
    }
}
