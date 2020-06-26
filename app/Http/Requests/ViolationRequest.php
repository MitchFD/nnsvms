<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ViolationRequest extends FormRequest
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
            'minor_offenses'           => 'nullable|array',
            'minor_offenses.*'         => 'string|distinct',
            'less_serious_offenses'    => 'nullable|array',
            'less_serious_offenses.*'  => 'string|distinct',
            'other_offenses'           => 'nullable|array',
            'other_offenses.*'         => 'string|distinct',
            'offense_count'            => 'integer',
            'recorded_at'              => 'string|required',
            'updated_at'              => 'string|required',
            'student_id'               =>  'integer',
            'user_id'                  => 'integer',
        ];
    }
}
