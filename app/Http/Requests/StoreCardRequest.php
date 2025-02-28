<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCardRequest extends FormRequest
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
            'suit' => ['required','exists:cards,suit'],
            'value'=> ['required','exists:cards,value'],
        ];
    }

    public function messages()
    {
        return [
            'suit.required' => 'select suit is required',
            'suit.exists' => 'select valid suit',
            'value.required'  => 'select Rank is required',
            'value.exists' => 'select valid ',
        ];
    }
}
