<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // messages_countを設定してくれる。messagesカウントは高速
    protected $withCount = ['messages'];

    // A user has many messages
    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public static function getUserList()
    {
        // pluckで値がname, キーがidのコレクションを取得する
        return static::latest()->pluck('name', 'id');
    }
}
