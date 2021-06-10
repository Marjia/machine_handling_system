<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
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

            'first_name' =>'required|string',
            'last_name' =>'required|string',
            'name' =>'required|string',
            'company_name' =>'required|string',
            'phone_number' =>'required|numeric',
            'address' =>'required|string',
            'tax_reg_no' =>'required|numeric',
            // 'is_admin' =>'required',
            'role_id'=>'required',
            'bank_account_type'=>'required',
            'web_site'=>'required',
            // 'is_active' =>'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password'=>'min:1|max:15|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=>'required|min:1|max:15'
        ];
    }
}
