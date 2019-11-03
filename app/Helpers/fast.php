<?php

use App\Consts\Code;
use App\Consts\Msg;
use App\Exceptions\ValidateFailed;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Validator;

/**
 * @param Validator $validator
 * @throws ValidateFailed
 */
function check($validator){
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
function wrapData($code, $msg, $data = null){
    return [
        'code' => $code,
        'msg' => $msg,
        'data' => $data
    ];
}

function wrap($code, $msg, $data, $status = 200, $headers = null){
    return new JsonResponse(
        wrapData($code, $msg, $data),
        $status,
        $headers
    );
}

function quickWrap($code, $data = null, $status = 200 , $headers = null){
    return new JsonResponse(
        wrapData($code,Msg::find($code),$data),
        $status,
        $headers
    );
}
