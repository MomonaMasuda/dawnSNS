<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
          'username' => 'required|string|min:4|max:12',
          'mail' => 'required|string|email|min:4|max:30|unique:users',
          'password' => 'required|string|min:4|max:12|confirmed|unique:users|alpha_num',
          'password-confirm' => 'required|string|min:4|max:12|confirmed|unique:users|alpha_num|same:password',
      ];
    }
    
    public function messages()
    {
        return [
            'username.required' => '名前を入力して下さい。',
            'username.min' => '名前は4文字以上入力して下さい。',
        ];
    }
}
