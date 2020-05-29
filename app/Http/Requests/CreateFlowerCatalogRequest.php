<?php

namespace App\Http\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
class CreateFlowerCatalogRequest extends FormRequest
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
            'name_catalog' => 'required|unique:flower_catalogs,name_catalog',
            'parent_id' => 'nullable',
        ];

    }

    public function messages()
    {
        return [
            'name_catalog.required' => __('validation.required'),
            'name_catalog.unique' => 'A given name must be unique!'
        ];
    }


}
