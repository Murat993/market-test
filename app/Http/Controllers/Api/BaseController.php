<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use function response;

class BaseController extends Controller
{

    public function handleResponse($result, $msg = '', $status = 200)
    {
        $res = [
            'success' => true,
            'data'    => $result,
            'message' => $msg,
        ];
        return response()->json($res, $status);
    }

    public function handleError($error, $code = 404, $errorMsg = [])
    {
        $res = [
            'success' => false,
            'message' => $error,
        ];
        if(!empty($errorMsg)){
            $res['data'] = $errorMsg;
        }
        return response()->json($res, $code);
    }
}
