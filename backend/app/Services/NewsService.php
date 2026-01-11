<?php

namespace App\Services;

use App\Models\News;
use Exception;
use Illuminate\Http\Request;

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
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }

    public function getNewsData($id)
    {
        try {
            $NewData = News::find($id);
            if (!$NewData) {
                return response()->json(['message' => 'News Not Found!'], 404);
            }
            return response(['data' => $NewData, 'message' => 'News Found Successfully!'], 200);
        } catch (Exception $error) {
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }

    public function addNews(Request $request)
    {
        try {
            $news = $request->validate([
                'image' => 'string',
                'date' => 'date',
                'address' => 'string',
                'title' => 'string',
                'description' => 'string',
            ]);
            News::create($news);
            return response(['message' => 'Created successfully', 'data' => $news], 200);
        } catch (Exception $error) {
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }

    public function updateNewsById(Request $request, $id)
    {
        try {
            $validatedRequest = $request->validate([
                'image' => 'string',
                'date' => 'date',
                'address' => 'string',
                'title' => 'string',
                'description' => 'string',
            ]);

            $prevNew = News::find($id);
            if (!$prevNew) {
                return response()->json(['message' => 'New Data Not Found!'], 404);
            }

            $prevNew->update($validatedRequest);
            return response()->json(['message' => 'Updated Successfully'], 200);
        } catch (Exception $error) {
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }

    public function deleteNewsById($id)
    {
        try {
            $prevNew = News::find($id);
            if(!$prevNew){
                return response()->json(['message' => 'New Data Not Found!'], 404);
            }
            $prevNew->delete();
            return response()->json(['message' => 'New Deleted Successfully'], 200);
        } catch (Exception $error) {
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }
}
