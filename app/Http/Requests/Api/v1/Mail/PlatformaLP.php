<?php

namespace App\Http\Requests\Api\v1\Mail;

use Illuminate\Foundation\Http\FormRequest;

class PlatformaLP extends FormRequest
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
            'form.msg' => 'required',
            'fields.*.name' => 'required',
            'fields.*.type' => 'required',
            'fields.*.value' => '',
        ];
    }
}
