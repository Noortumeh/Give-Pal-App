<?php

namespace App\Services;

class ResponseService
{
    public function responseSuccess($data, $message = "Operation successful")
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ],
            200
        );
    }

    public function responseError($message = "An error occurred" ,$error = null ,$code = 500)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            $error
        ], $code);
    }
}
