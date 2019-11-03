<?php


namespace App\Consts;


class Code
{
    /**
     * all | 请求成功
     */
    const OK = 0;
    /**
     * all | 参数错误
     */
    const ARGUMENT_ERROR = 300;

    const USER_EXISTED = 150;
}

class Msg
{
    public static function find($code){
        return MSG::$msg[$code];
    }

    private static $msg = [
        Code::OK => '请求成功',
        Code::ARGUMENT_ERROR => '请求参数错误',
        
    ];
}


