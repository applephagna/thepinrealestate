<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditValidation extends FormRequest
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
				'username' => 'required|string|max:50',
				'email' => 'required|email',
				'phone' => 'required',
				'referal_code' => 'required',
				'province_id' => 'required',
				'district_id' => 'required',
				'commune_id' => 'required',
				'photo' => 'required',
			];
    }

    public function messages()
    {
			return [
				'name_en.required'         => 'Please, Add User Name.',
				'name_kh.required'         => 'Please, Add User NameKh.',
				'username.required'        => 'Please, Add User User Name.',
				'email.required'           => 'Please, Add Email.',
				'phone.unique'             => 'Please, Add Unique Phone.',
				'referal_code.unique'      => 'Please, Add Correct Referal Code.',
				'province_id.unique'      => 'Please, Choose Province.',
				'district_id.unique'      => 'Please, Choose District.',
				'commune_id.unique'      => 'Please, Choose the Commune.',
				'photo.required'        => 'Please, Upload Photo.'
			];
    }
}
