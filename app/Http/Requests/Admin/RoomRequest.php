<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoomRequest extends FormRequest
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
            'name'              => 'required|string',
            'description'       => 'nullable|string',
            'capacity'          => 'nullable|numeric|lt:100000',
            'price'             => 'nullable|numeric|gt:0',
            'photo.*'           => 'nullable|image|max:2048',
            'category_id'       => 'required|exists:room_categories,id',
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'Deskripsi harus berupa teks.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'capacity.numeric' => 'Kapasitas harus berupa angka.',
            'capacity.lt' => 'Kapasitas tidak boleh melebihi 100000.',
            'price.numeric' => 'Harga harus berupa angka.',
            'price.gt' => 'Harga harus lebih dari 0.',
            'photo.*.image' => 'File harus berupa gambar.',
            'photo.*.max' => 'Ukuran gambar tidak boleh melebihi :max KB.',
            'category_id.required' => 'Kategori ruangan harus dipilih.',
            'category_id.exists' => 'Kategori ruangan yang dipilih tidak valid.',
        ];
    }
}
