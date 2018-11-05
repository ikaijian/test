<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/2
 * Time: 20:20
 */

namespace App\Http\Controllers;


trait Result
{
    public function success()
    {
        return response()->json(
            [
                'message' => 'success',
                'status_code' => 200,
            ]
        ,200);
    }

    public function successWithInfo($data)
    {
        return response()->json(
            [
                'data'=>$data,
                'message' => 'success',
                'status_code' => 200,
            ]
            ,200);
    }

    public function error()
    {
        return response()->json(
            [
                'message' => 'error',
                'status_code' => 404,
            ]
        ,404);
    }

    public function errorWithInfo($info)
    {
        return response()->json(
            [
                'errorInfo'=>$info,
                'message' => 'error',
                'status_code' => 404,
            ]
            ,404);
    }
}