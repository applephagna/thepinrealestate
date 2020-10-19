<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AddValidation extends FormRequest
{
    public function authorize()
    {
      return true;
    }

    public function rules()
    {
			return [
				'name_en' => 'required|string|max:50',
				'name_kh' => 'required|string|max:50',
				'username' => 'required|string|max:50|unique:users',
				'email' => 'required|email|unique:users',
				'phone' => 'required|unique:users',
				'referal_code' => 'required',
				'referal_user_id' => 'required',
				'referal_user_code' => 'required',
				'province_id' => 'required',
				'district_id' => 'required',
				'commune_id' => 'required',
				'password' => 'required|min:6|confirmed',
				'photo' => 'required',
			];
		}

    public function messages()
    {
			return [
				'name_en.required'              => 'Please, Add Name.',
				'name_kh.required'              => 'Please, Add NameKh.',
				'username.required'             => 'Please, Add UserName.',
				'email.required'                => 'Please, Add Email.',
                'email.unique'                  => 'Please, Add Unique Email.',
                'email.required'                => 'Please, Add Phone.',
				'phone.unique'                  => 'Please, Add Unique Phone.',
                'referal_code.required'         => 'Please, Add Correct Referal Code.',
                'referal_user_id.required'      => 'Please, Add Correct Referal_User_ID.',
                'referal_user_code.required'    => 'Please, Add Correct Referal_User_Code.',
				'province_id.required'          => 'Please, Choose Province.',
				'district_id.required'          => 'Please, Choose District.',
				'commune_id.required'           => 'Please, Choose the Commune.',
				'password.required'             => 'Please, Add Password.',
				'photo.required'                => 'Please, Upload Photo.'
			];
    }
}
