<?php

namespace App\Http\Requests;

use App\Users;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_last_name'   => 'required',
            'user_first_name'  => 'required',
            'user_employee_id' => 'required',
            'user_description' => 'required',
            'user_role'        =>  'required',
            'user_image'       => 'sometimes|image|max:1999',
            'email'            => ['required', 'email', Rule::unique((new Users)->getTable())->ignore(auth()->id('user_id'))],
        ];
    }
}
