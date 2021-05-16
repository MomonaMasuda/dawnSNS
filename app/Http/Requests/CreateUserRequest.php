<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
          'mail' => 'required|string|email|min:4|max:30|unique:users,mail',
          'password' => 'required|string|min:4|max:12|alpha_num|confirmed',
          'password_confirmation' => 'required|string|min:4|max:12|alpha_num',
      ];
    }

    public function messages()
    {
        return [
            'username.required' => '名前を入力して下さい',
            'username.min' => '名前は4文字以上入力して下さい',
            'username.max' => '名前は12文字以下で入力して下さい',

            'mail.required' => 'メールアドレスを入力して下さい',
            'mail.email' => 'メールアドレスの形式で入力して下さい',
            'mail.min' => 'メールアドレスは4文字以上入力して下さい',
            'mail.max' => 'メールアドレスは30文字以下で入力して下さい',
            'mail.unique' => '既に登録済のメールアドレスです',

            'password.required' => 'パスワードを入力して下さい',
            'password.min' => 'パスワードは4文字以上入力して下さい',
            'password.max' => 'パスワードは12文字以下で入力して下さい',
            'password.alpha_num' => '英数字のみで入力して下さい',
            'password.confirmed' => 'パスワードは同じものを入力して下さい',

            'password_confirmation.required' => '確認のためもう一度パスワードを入力して下さい',
            'password_confirmation.min' => '確認用パスワードは4文字以上入力して下さい',
            'password_confirmation.max' => '確認用パスワードは12文字以下で入力して下さい',
            'password_confirmation.alpha_num' => '英数字のみで入力して下さい',


        ];
    }
}
