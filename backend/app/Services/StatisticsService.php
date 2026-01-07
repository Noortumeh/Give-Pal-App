<?php

namespace App\Services;

use App\Models\Statistics;
use Exception;
use Illuminate\Http\Request;

class StatisticsService
{

    public function getStatistics()
    {
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

    public function getStatisticsData($id)
    {
        try {
            $statistics = Statistics::find($id);
            if (!$statistics) {
                return response()->json(['message' => 'Statistics Not Found!'], 209);
            }
            return response(['data' => $statistics, 'message' => 'Statistics Found Successfully!'], 200);
        } catch (Exception $error) {
            return response()->json('Server Error: ' + $error, 500);
        }
    }

    public function addStatistics(Request $request)
    {
        try {
            $statistics = $request->validate([
                'projects_number' => 'int',
                'beneficiaries_of_cultural_program' => 'int',
                'beneficiaries_of_relief_program' => 'int',
                'articles_number' => 'int'
            ]);
            Statistics::create($statistics);
            return response(['message' => 'Created successfully', 'data' => $statistics], 200);
        } catch (Exception $error) {
            return response()->json('Server Error: ' + $error, 500);
        }
    }

    public function updateStatistics(Request $request, $id)
    {
        try {
            $newStatistics = $request->validate([
                'projects_number' => 'int',
                'beneficiaries_of_cultural_program' => 'int',
                'beneficiaries_of_relief_program' => 'int',
                'articles_number' => 'int'
            ]);

            $statistics = Statistics::find($id);
            if (!$statistics) {
                return response()->json(['message' => 'Statistics Not Found!'], 209);
            }

            $statistics->update($newStatistics);
            return response()->json(['message' => 'Updated Successfully'], 200);
        } catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function deleteStatistics($id)
    {
        try {
            $statistics = Statistics::find($id);
            if (!$statistics) {
                return response()->json(['message' => 'Statistics Not Found!'], 209);
            }
            $statistics->delete();
            return response()->json(['message' => 'Statistics Deleted Successfully'], 200);
        } catch (Exception $error) {
            return response()->json($error, 500);
        }
    }
}
