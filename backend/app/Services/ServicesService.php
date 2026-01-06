<?php

namespace App\Services;

use App\Models\Services;
use Exception;
use Illuminate\Http\Request;

class ServicesService
{

    public function getServices()
    {
        try {
            $Services = Services::all();
            if (!$Services->isEmpty()) {
                return response()->json($Services, 200);
            } else {
                return response()->json('There is No Services Found', 404);
            }
        } catch (Exception $error) {
            return response()->json('Server Error: '+$error, 500);
        }
    }
}
