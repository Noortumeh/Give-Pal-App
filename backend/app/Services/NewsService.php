<?php

namespace App\Services;

use App\Facades\StoreFile;
use App\Http\Requests\NewsRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Exception;

class NewsService
{

    public function getNews()
    {
        try {
            $data = News::getNewsHomePage();
            if (!$data->isEmpty()) {
                return response()->json($data, 200);
            } else {
                return response()->json('There is No News Found', 404);
            }
        } catch (Exception $error) {
            return response()->json(['message' => 'Server Error', $error], 500);
        }
    }

    public function getNewsData($id)
    {
        try {
            $NewData = News::find($id);
            if (!$NewData) {
                return response()->json(['message' => 'News Not Found!'], 404);
            }
            return response(['data' => new NewsResource($NewData), 'message' => 'News Found Successfully!'], 200);
        } catch (Exception $error) {
            return response()->json(['message' => 'Server Error', $error], 500);
        }
    }

    public function addNews(NewsRequest $request)
    {
        try {
            $news = $request->validated();
            if ($request->hasFile('image')) {
                 $news['image'] = StoreFile::storeFile($request->image, 'news-images');
            }
            News::create($news);
            return response(['message' => 'Created successfully', 'data' => $news], 200);
        } catch (Exception $error) {
            return response()->json(['message' => 'Server Error', $error], 500);
        }
    }

    public function updateNewsById(NewsRequest $request, $id)
    {
        try {
            $validatedRequest = $request->validated();
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
            return response()->json(['message' => 'Server Error', $error], 500);
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
            return response()->json(['message' => 'Server Error', $error], 500);
        }
    }
}
