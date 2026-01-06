<?php

namespace App\Services;

use App\Models\SuccessPartners;
use Exception;

class SuccessPartnersService
{

    public function getSuccessPartners()
    {
        try {
            $data = SuccessPartners::all();
            if (!$data->isEmpty()) {
                return response()->json($data, 200);
            } else {
                return response()->json('There is No News Found', 404);
            }
        } catch (Exception $error) {
            return response()->json('Server Error', 500);
        }
    }
}
