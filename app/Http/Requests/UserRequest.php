<?php

namespace App\Http\Requests;

use App\Users;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => [
                'required', 'email', Rule::unique((new Users)->getTable())->ignore($this->route()->user->user_id ?? null)
            ],
            'password' => [
                $this->route()->user ? 'nullable' : 'required', 'confirmed', 'min:6'
            ],
            'user_image' => 'sometimes|image|max:1999',
        ];
    }
}
