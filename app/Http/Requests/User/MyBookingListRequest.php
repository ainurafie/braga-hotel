<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

use Carbon\Carbon;

class MyBookingListRequest extends FormRequest
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
        $rules = [
            'room_id'    => 'required|integer|exists:rooms,id',
            'start_date' => 'required|date_format:Y-m-d|after_or_equal:today',
            'end_date'   => 'required|date_format:Y-m-d|after:start_date',
            'duration'   => 'required|integer|min:1',
            'purpose'    => 'nullable|string|max:100',
            'total_price' => 'required|numeric|min:0',
        ];

        return $rules;
    }
}
