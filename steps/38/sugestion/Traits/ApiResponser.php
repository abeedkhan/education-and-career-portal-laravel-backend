<?php
namespace App\Traits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Created by: Md. Abid Azam Khan
 * Email:macatip@gmail.com.
 * Mobile:+8801866454466.
 * Created At: Date- 2/23/2019 , Time- 6:18 AM
 */
trait ApiResponser{
    private function successResponse($data , $code){
        return response()->json($data , $code);
    }
    protected function errorResponse($message , $code){
        return response()->json(['error'=>$message ,'code'=> $code] , $code);
    }
    protected function showAll(Collection $collection, $code = 200){
        return $this->successResponse(['data'=>$collection] , $code);
    }
    protected function showOne(Model $model, $code = 200){
        return $this->successResponse(['data'=>$model] , $code);
    }
}

