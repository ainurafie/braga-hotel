<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title'                 => 'sometimes|required|string|',
            'date'                  => 'required|date_format:Y-m-d|after_or_equal:today',
            'description'           => 'nullable|string',
            'photo'                 => 'nullable|image|max:2048',
        ];
    }
}
