<?php

namespace App\Http\Controllers\Api;

use App\Consts\Code;
use App\Exceptions\ValidateFailed;
use App\Helper;
use App\User;
use App\Validators\UserValidators;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidateFailed
     */
    public function create(Request $request){
        $params = $request->all();

        try{
            Helper::check(UserValidators::create($params));
        } catch (ValidateFailed $e){
            return Helper::quickWrap(Code::ARGUMENT_ERROR, $e->getMessage());
        }


        if(User::findByName($params['name']) !== null){
            return Helper::quickWrap(Code::USER_EXISTED);
        }

        $user = User::createUser(
            $params['name'],
            $params['nickname'],
            $params['email'],
            $params['password']
        );

        return Helper::wrap(Code::OK, '创建用户成功', $user);
    }

    public function test(Request $request){
        return new Response('hello world');
    }
}
