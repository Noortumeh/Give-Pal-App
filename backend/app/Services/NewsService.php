<?php

namespace App\Services;

use App\Facades\StoreFile;
use App\Models\News;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                'image' => 'file|max:2048|mimes:png,jpg,jpeg,gif,ico',
                'date' => 'date',
                'address' => 'string',
                'title' => 'string',
                'description' => 'string',
            ]);
            if ($request->hasFile('image')) {
                 $news['image'] = StoreFile::storeFile($request->image, 'news-images');
            }
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
                'image' => 'file|max:2048|mimes:png,jpg,jpeg,gif,ico',
                'date' => 'date',
                'address' => 'string',
                'title' => 'string',
                'description' => 'string',
            ]);

            $prevNew = News::find($id);
            if (!$prevNew) {
                return response()->json(['message' => 'New Data Not Found!'], 404);
            }
            if ($request->hasFile('image')) {
                $validatedRequest['image'] = StoreFile::updateStoredFile($prevNew->image, $request->image, 'news-images');
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
            if (!$prevNew) {
                return response()->json(['message' => 'New Data Not Found!'], 404);
            }
            StoreFile::deleteStoredFile($prevNew->image);
            $prevNew->delete();
            return response()->json(['message' => 'New Deleted Successfully'], 200);
        } catch (Exception $error) {
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }
}
