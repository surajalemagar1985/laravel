<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidation extends FormRequest
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
            'pname'=>'required|min:2|regex:/^[\pL\s\-]+$/u|unique:products,product_name',
            'price'=>'required|numeric',
            'description'=>'required|min:50',
            'image'=>'required|image',
            'category'=>'required'
            
        ];
    }
    public function messages()
    {
     return[
     'pname.required'=>'product name is required',
     'pname.min'=>'product name must contain minimum 2 character',
     'pname.regex'=>'product name only supports alphebet',
     'pname.unique'=>'product name already exists',
     'price.required'=>'product price is required',
     'price.numeric'=>'only supports numbers',
     'description.required'=>'product description is required',
     'image.required'=>'image of product is required',
     'image.image'=>'must be image file',
     'category.required'=>'product category is required'


     ];  
    }

}

