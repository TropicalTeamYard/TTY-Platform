<?php

namespace App\Constant;

use App\Constant\Code;
use App\Exceptions\KeyNotFoundException;

class Constants
{
    /**
     * @var array 请求返回的代码对应的默认msg.
     */
    public static $msg = [
        Code::OK => '请求成功',
        Code::ARGUMENT_ERROR => '请求参数错误',
        Code::USER_EXISTED => '该用户名已存在',
    ];

    /**
     * @param $code
     * @return mixed
     */
    public static function findMsg($code){
        return Constants::$msg[$code];
    }
}
