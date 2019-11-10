<?php

namespace App;

use App\Consts\Code;
use App\Consts\Msg;
use App\Exceptions\ValidateFailed;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Validator;

class Helper{
    /**
     * @param Validator $validator
     * @throws ValidateFailed
     */
    public static function check($validator){
        if($validator->fails()){
            throw new ValidateFailed($validator->errors());
        }
    }


    /**
     * @param int $code
     * @param String $msg
     * @param mixed $data
     * @return array
     */
    public static function wrapData($code, $msg, $data = null){
        return [
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ];
    }

    public static function wrap($code, $msg, $data = null, $status = 200, $headers = []){
        return new JsonResponse(
            Helper::wrapData($code, $msg, $data),
            $status
        );
    }

    public static function quickWrap($code, $data = null, $status = 200 , $headers = []){
        return new JsonResponse(
            Helper::wrapData($code, Msg::find($code), $data),
            $status
        );
    }

}

