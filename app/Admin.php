<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


// 認証機能をモデルに追加したいために変更（Userを参考に）
use Illuminate\Foundation\Auth\User as Authenticatable;
//class Admin extends Model
class Admin extends Authenticatable
{



}
