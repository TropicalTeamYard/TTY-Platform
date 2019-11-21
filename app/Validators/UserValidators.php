<?php


namespace App\Validators;

use App\Constant\ValidatorRule;
use Validator;

class UserValidators
{
    /**
     * @param $params
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public static function create($params){
        return Validator::make($params, [
            'name' => ValidatorRule::NAME,
            'nickname' => ValidatorRule::NICKNAME,
            'email' => ValidatorRule::EMAIL,
            'password' => ValidatorRule::PASSWORD
        ]);
    }
}
