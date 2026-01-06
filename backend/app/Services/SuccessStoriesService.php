<?php

namespace App\Services;

use App\Models\SuccessStories;
use Exception;

class SuccessStoriesService
{

    public function getSuccessStories()
    {
        try {
            $data = SuccessStories::all();
            if (!$data->isEmpty()) {
                return response()->json($data, 200);
            } else {
                return response()->json('There is No Success Stories Found', 404);
            }
        } catch (Exception $error) {
            return response()->json('Server Error', 500);
        }
    }
}
