<?php

namespace App\Http\Controllers\Api;

use App\Constant\Code;
use App\Exceptions\ValidateFailedException;
use App\Http\Controllers\Controller;
use App\User;
use App\Validators\UserValidators;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class UserController extends Controller
{
    /**
     * 创建一个新的用户
     * method: POST args:name,nickname,email,password
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request){
        $params = $request->all();

        try {
            check(UserValidators::create($params));
        } catch (ValidateFailedException $e){
            return wrap(Code::OK, $e->getMessage());
        }

        if(User::findByName($params['name']) !== null){
            return wrap(Code::USER_EXISTED);
        }

        $user = User::createUser(
            $params['name'],
            $params['nickname'],
            $params['email'],
            $params['password']
        );

        return wrapWithMsg(Code::OK, '创建用户成功', $user);
    }

    public function login(Request $request){
        $params = $request->all();

    }
}
