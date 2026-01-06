<?php

namespace App\Services;

use App\Models\Statistics;
use Exception;

class StatisticsService{

    public function getStatistics(){
        try {
            $statistics = Statistics::all();
            if (!$statistics->isEmpty()) {
                return response()->json($statistics, 200);
            } else {
                return response()->json('There is No Statistics Found', 404);
            }
        } catch (Exception $error) {
            return response()->json('Server Error', 500);
        }
    }
}