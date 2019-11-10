<?php


namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class UserValidators
{
    public static function create($all){
        return Validator::make($all, [
            'name' => 'required|between:2,20|alpha_dash',
            'nickname' => 'required|between:2,20|regex:/^[\u4e00-\u9fa5_a-zA-Z0-9]+$/',
            'email' => 'required|email',
            'password' => 'required|between:6,128|alpha_dash'
        ]);
    }
}
