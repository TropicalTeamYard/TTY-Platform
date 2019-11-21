<?php

namespace App\Http\Controllers;

use App\Constant\Code;
use App\Exceptions\ValidateFailedException;
use App\Http\Controllers\Controller;
use App\Validators\TestValidators;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     */
    public function welcome(Request $request){
        return simpleText("Welcome to laravel");
    }

    /**
     * method POST
     * @param Request $request
     * @return JsonResponse
     */
    public function encryptPassword(Request $request){
        $params = $request->all();

        try {
            check(TestValidators::encryptPassword($params));
        } catch ( ValidateFailedException $e){
            return wrap(Code::ARGUMENT_ERROR, $e->getMessage());
        }

        $encrypted = encryptPassword($params['value']);

        return wrap(Code::OK,$encrypted);

    }
}
