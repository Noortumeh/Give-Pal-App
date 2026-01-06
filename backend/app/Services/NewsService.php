<?php

namespace App\Services;

use App\Models\News;
use Exception;

class NewsService
{

    public function getNews()
    {
        try {
            $data = News::all();
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
