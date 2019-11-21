<?php

use App\Exceptions\KeyNotFoundException;
use App\Exceptions\ValidateFailedException;
use Illuminate\Http\JsonResponse;
use App\Constant\Constants;

/**
 * wrap the data to array.
 * @param int $code
 * @param string $msg
 * @param mixed $data
 * @return array
 */
function _wrapData($code, $msg, $data=null){
    return [
        'code' => $code,
        'msg' => $msg,
        'data' => $data
    ];
}

/**
 * @param $code
 * @param mixed $data
 * @param integer $status
 * @param array $headers
 * @return JsonResponse
 */
function wrap($code, $data = null, $status = 200, $headers = []) {
    return wrapWithMsg($code, Constants::findMsg($code),$data, $status, $headers);
}

/**
 * @param $code
 * @param $msg
 * @param mixed $data
 * @param integer $status
 * @param array $headers
 * @return JsonResponse
 */
function wrapWithMsg($code , $msg, $data = null, $status = 200, $headers = []){
    return new JsonResponse(
        _wrapData($code, $msg, $data),
        $status
    );
}

function simpleText($value){
    return new \Illuminate\Http\Response($value);
}

/**
 * @param \Illuminate\Contracts\Validation\Validator $validator
 * @throws ValidateFailedException
 */
function check($validator){
    if($validator->fails()){
        throw new ValidateFailedException($validator->errors());
    }
}
