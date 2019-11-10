<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;

use App\Consts\UserIdentity;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @method static where(string $string, String $name)
 */
class User extends Model
{
    use Notifiable;

    /**
     * @var array 可填充字段
     */
    protected $fillable = [
        'name', 'identity', 'uid', 'nickname', 'email', 'password', 'email_verified_at'
    ];

    /**
     * @var array 隐藏字段
     */
    protected $hidden = [
        'password',
    ];

    /**
     * @var array 自动转换
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function createUser(String $name, String $nickname, String $email, String $password, String $identity = UserIdentity::NORMAL){
        if(User::findByName($name) != null){
            return null;
        }

        $row = User::create(
            [
                'name' => $name,
                'identity' => $identity,
                'uid' => Str::random(24),
                'nickname' => $nickname,
                'email' => $email,
                'password' => Hash::make(encrypt($password)),
            ]
        );

        return $row;
    }



    public static function findByName(String $name){
        return User::where('name',$name)->first();
    }
}
