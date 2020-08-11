<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            //
            'email' => 'unique:vp_users,email',
            'passwordconfin'=>'same:password'
        ];
    }
    public function messages()
    {
        return[
            'email.unique' => 'Email đã bị trùng!',
            'passwordconfin.same' => 'Mật khẩu không giống nhau'
        ];
    }
}
