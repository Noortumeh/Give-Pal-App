<?php

namespace App\Services;

use App\Http\Requests\StatisticsRequest;
use App\Http\Resources\StatisticsResource;
use App\Models\Statistics;
use Exception;

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
            return response()->json(['message' => 'Server Error', $error], 500);
        }
    }

    public function getStatisticsData($id)
    {
        try {
            $statistics = Statistics::find($id);
            if (!$statistics) {
                return response()->json(['message' => 'Statistics Not Found!'], 404);
            }
            return response(['data' => new StatisticsResource($statistics), 'message' => 'Statistics Found Successfully!'], 200);
        } catch (Exception $error) {
            return response()->json(['message' => 'Server Error', $error], 500);
        }
    }

    public function addStatistics(StatisticsRequest $request)
    {
        try {
            $statistics = $request->validated();
            Statistics::create($statistics);
            return response(['message' => 'Created successfully', 'data' => $statistics], 200);
        } catch (Exception $error) {
            return response()->json(['message' => 'Server Error', $error], 500);
        }
    }

    public function updateStatistics(StatisticsRequest $request, $id)
    {
        try {
            $newStatistics = $request->validated();

            $statistics = Statistics::find($id);
            if (!$statistics) {
                return response()->json(['message' => 'Statistics Not Found!'], 404);
            }

            $statistics->update($newStatistics);
            return response()->json(['message' => 'Updated Successfully'], 200);
        } catch (Exception $error) {
            return response()->json(['message' => 'Server Error', $error], 500);
        }
    }

    public function deleteStatistics($id)
    {
        try {
            $statistics = Statistics::find($id);
            if (!$statistics) {
                return response()->json(['message' => 'Statistics Not Found!'], 404);
            }
            $statistics->delete();
            return response()->json(['message' => 'Statistics Deleted Successfully'], 200);
        } catch (Exception $error) {
            return response()->json(['message' => 'Server Error', $error], 500);
        }
    }
}
