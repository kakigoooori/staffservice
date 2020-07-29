<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoolRequest extends FormRequest
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
            'work' =>'required',
            'price' => ['required','regex:/^[0-9]+$/','max:20'],
            'start' => 'required',
            'end' => 'required',
            'worknote' => 'required',
        ];
    }
}
