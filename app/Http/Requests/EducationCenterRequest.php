<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationCenterRequest extends FormRequest
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
            'name_kz' => 'required|min:5|max:50',
            'name_ru' => 'required|min:5|max:50',
            'description_kz' => 'required|min:10|max:500',
            'description_ru' => 'required|min:10|max:500',
            'contact_phone' => 'required',
            'contact_email' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ];
    }

    public function validationData()
    {
        return $this->post();
    }

    public function messages()
    {
        return [
            'image.mimes' => 'This image is not supported.',
        ];
    }
}
