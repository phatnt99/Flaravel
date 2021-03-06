<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFlowerCatalogRequest extends FormRequest
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
        $id = $this->flowercatalog;
        return [
            //
            'name_catalog' => 'sometimes|required|unique:flower_catalogs,name_catalog,'.$id,
            'parent_id' => 'nullable',
        ];

    }
    public function messages()
    {
        return [
            'name_catalog.required' => 'A given name cannot be empty!',
            'name_catalog.unique' => 'A given name must be unique!'
        ];
    }
}
