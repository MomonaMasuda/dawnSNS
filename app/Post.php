<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
      'user_id','post'
  ];

  public function rules()
    {
        return [
            'old_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if(!(\Hash::check($value, \Auth::user()->password))) {
                      return $fail('現在のパスワードを正しく入力してください');
                    }
                },
            ],
            'password' => 'required|string|min:6|confirmed|different:current-password',
        ];
    }
}
