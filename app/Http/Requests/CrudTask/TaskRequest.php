<?php

namespace App\Http\Requests\CrudTask;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'name' => 'required|max:255',
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Tên quá số lượng ký tự quy định!'
        ];
    }
}
