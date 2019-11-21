<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;

use App\Constant\UserIdentity;
use Hash;
use Str;


/**
 *
 */
class User extends Model
{
    use Notifiable;

    /**
     * @var array fillable Fields
     */
    protected $fillable = [
        'name', 'identity', 'uid', 'nickname', 'email', 'password', 'email_verified_at'
    ];

    /**
     * @var array hidden Fields
     */
    protected $hidden = [
        'password',
    ];

    /**
     * @var array autoCast
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function findByName(String $name){
        return User::where('name',$name);
    }

    public static function createUser(String $name, String $nickname, String $email, String $password, String $identity = UserIdentity::NORMAL){
        if(User::findByName($name) !== null){
            return null;
        }

        $row = User::create(
            [
                'name' => $name,
                'identity' => $identity,
                'uid' => Str::random(16),
                'nickname' => $nickname,
                'email' => $email,
                'password' => encryptPassword($password),
            ]
        );

        return $row;
    }
}
