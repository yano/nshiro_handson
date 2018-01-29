<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveMessage extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * このリクエストにオーサライズが必要か？
     * 認証画面内でのFormリクエストならTrueにする。
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $message = $this->route('message');

        // message引数がある場合とない場合で、validationを変更する
        if (optional($message)->exists) {
            return [
                'user_id' => 'required|exists:users,id', # 指定テーブルの指定カラムないに存在するか
                'title' => 'required|max:255',
                'content' => 'required|max:50000',
            ];
        }
        else{
            return [
                'user_id' => 'required|exists:users,id', # 指定テーブルの指定カラムないに存在するか
                'title' => 'required|max:255',
                'content' => 'required|max:50000',
            ];
        }
    }

    public function messages()
    {
        return [
            'user_id.required' => '誰宛かを選択してください。',
        ];
    }

    public function attributes()
    {
        return [
            'user_id' => '誰宛',
            'title'   => 'タイトル',
            'content' => '本文',
        ];
    }

    public function getData()
    {
        // 方法１、手動で記載
        return $this->only('user_id', 'title', 'content');
        // 方法２、rules()のキーに列挙された項目のみで返す
        // return $this->all(array_keys($this->rules()));
    }

//    // バリデーション前にデータを加工することができる
//    protected function prepareForValidation(){}

}
