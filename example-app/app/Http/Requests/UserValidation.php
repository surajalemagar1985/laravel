<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidation extends FormRequest
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
            'fname'=>'required|min:3|regex:/^[\pL\s\-]+$/u',
            'email'=>'required|email|unique:user_details,user_email',
            'gender' => 'required',
            'pass' => 'required|min:7|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@]).*$/|confirmed'
            
        ];
    }
   public function messages(){
    return[
    'fname.required'=>'fulname is required',
    'fname.min'=>'fullname must be more than 3 characters',
    'fname.regex'=>'fullname only supports string character not number',
    'email.required'=>'email is required',
    'email.email'=>'invalid email address',
    'email.unique'=> 'email must be unique',
    'gender' => 'please choose your gender',
    'pass.required'=>'password is required',
    'pass.min' =>'password must not be less than seven character',
    'pass.regex' => 'password must contain alpbahet,number,special character'

];

   }
}
