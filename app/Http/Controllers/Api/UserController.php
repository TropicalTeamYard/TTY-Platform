<?php


namespace App\Http\Controllers\Api;


use App\Exceptions\ValidateFailed;
use App\User;
use App\Validators\UserValidators;
use Illuminate\Http\Request;

class UserController
{
    /**
     * @param Request $request
     * @throws ValidateFailed
     */
    public function create(Request $request){
        $params = $request->all();
        check(UserValidators::create($params));


        if(User::findByName($params['name']) !== null){

        }
    }
}
