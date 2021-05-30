<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

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
        'mail' => 'required|string|email|min:4|max:30|unique:users,mail,'.Auth::user()->mail.',mail',
        'old_password' => 'required|string|min:4|max:12|alpha_num',
        'password' => 'required|string|min:4|max:12|alpha_num|different:old_password|confirmed',
        'password_confirmation' => 'required|string|min:4|max:12|alpha_num',
        'bio' => 'max:200',
        'image' => 'image',
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

          'old_password.required' => '現在のパスワードを入力して下さい',
          'old_password.min' => 'パスワードは4文字以上入力して下さい',
          'old_password.max' => 'パスワードは12文字以下で入力して下さい',
          'old_password.alpha_num' => '英数字のみで入力して下さい',

          'password.required' => '新しいパスワードを入力して下さい',
          'password.min' => 'パスワードは4文字以上入力して下さい',
          'password.max' => 'パスワードは12文字以下で入力して下さい',
          'password.alpha_num' => '英数字のみで入力して下さい',
          'password.different' => '以前のパスワードと異なるもので入力して下さい',
          'password.confirmed' => 'パスワードは同じものを入力して下さい',

          'password_confirmation.required' => '確認用パスワードを入力して下さい',
          'password_confirmation.min' => '確認用パスワードは4文字以上入力して下さい',
          'password_confirmation.max' => '確認用パスワードは12文字以下で入力して下さい',
          'password_confirmation.alpha_num' => '英数字のみで入力して下さい',


          'bio.max' => 'Bio欄は200文字以下で入力して下さい',

          'image.image' => '画像ファイルを選択して下さい',
        ];
    }
}
