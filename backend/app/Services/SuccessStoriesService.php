<?php

namespace App\Services;

use App\Facades\StoreFile;
use App\Http\Requests\SuccessStoriesRequest;
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

    public function getSuccessStorieData($id)
    {
        try {
            $successStory = SuccessStories::find($id);
            if (!$successStory) {
                return response()->json(['message' => 'SuccessStory Not Found!'], 404);
            }
            return response(['data' => $successStory, 'message' => 'SuccessStory Found Successfully!'], 200);
        } catch (Exception $error) {
            return response()->json('Server Error: ' + $error, 500);
        }
    }


    public function addSuccessStories(SuccessStoriesRequest $request)
    {
        try {
            $successStory = $request->validated();

            if ($request->hasFile('avatar')) {
                $successStory['avatar'] = StoreFile::storeFile($request->avatar, 'successStories-avatars');
            }

            SuccessStories::create($successStory);
            return response(['message' => 'Created successfully', 'data' => $successStory], 200);
        } catch (Exception $error) {
            return response()->json('Server Error: ' + $error, 500);
        }
    }

    public function updateSuccessStories(SuccessStoriesRequest $request, $id)
    {
        try {
            $newSuccessStory = $request->validated();

            $successStory = SuccessStories::find($id);
            if (!$successStory) {
                return response()->json(['message' => 'SuccessStory Not Found!'], 404);
            }

            if ($request->hasFile('avatar')) {
                $newSuccessStory['avatar'] = StoreFile::updateStoredFile($successStory->avatar, $request->avatar, 'successStories-avatars');
            }

            $successStory->update($newSuccessStory);
            return response()->json(['message' => 'Updated Successfully'], 200);
        } catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function deleteSuccessStories($id)
    {
        try {
            $successStory = SuccessStories::find($id);
            if (!$successStory) {
                return response()->json(['message' => 'SuccessStory Not Found!'], 404);
            }

            StoreFile::deleteStoredFile($successStory->avatar);

            $successStory->delete();
            return response()->json(['message' => 'SuccessStory Deleted Successfully'], 200);
        } catch (Exception $error) {
            return response()->json($error, 500);
        }
    }
}
