<?php


namespace App\Http\Middleware;

use App\Consts\Code;
use App\Exceptions\ValidateFailed;
use Closure;

class CatchValidateError
{
    public function handle($request, Closure $next){
        try{
            $next($request);
        }catch (ValidateFailed $e){
            return quickWrap(Code::ARGUMENT_ERROR,$e->getMessage());
        }
    }
}
