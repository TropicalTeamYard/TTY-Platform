<?php


namespace App\Validators;

use App\Constant\ValidatorRule;
use Validator;

class TestValidators
{
    public static function encryptPassword($params){
        return Validator::make($params, [
            'value' => ValidatorRule::PASSWORD
        ]);
    }
}
