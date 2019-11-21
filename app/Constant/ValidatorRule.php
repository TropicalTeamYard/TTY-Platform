<?php


namespace App\Constant;


class ValidatorRule
{
    const NAME = 'required|between:2,20|alpha_dash';
    const PASSWORD = 'required|between:6,128|alpha_dash';
    const NICKNAME = 'required|between:2,20|regex:/^[\u4e00-\u9fa5_a-zA-Z0-9]+$/';
    const EMAIL = 'required|email';
}
