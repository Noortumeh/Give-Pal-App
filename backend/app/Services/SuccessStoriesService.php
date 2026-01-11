<?php

namespace App\Services;

use App\Models\SuccessStories;
use Exception;
use Illuminate\Http\Request;

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

    public function getSuccessStorieData($id){
         try {
            $successStory = SuccessStories::find($id);
            if (!$successStory) {
                return response()->json(['message' => 'SuccessStory Not Found!'], 404);
            }
            return response(['data' => $successStory, 'message' => 'SuccessStory Found Successfully!'],200);

        } catch (Exception $error) {
            return response()->json('Server Error: ' + $error, 500);
        }
    }
    

    public function addSuccessStories(Request $request){
        try {
            $successStory = $request->validate([
                'avatar' => 'string',
                'name' => 'string',
                'address' => 'string',
                'description' => 'string'
            ]);
            SuccessStories::create($successStory);
            return response(['message' => 'Created successfully', 'data' => $successStory], 200);
        } catch (Exception $error) {
            return response()->json('Server Error: ' + $error, 500);
        }
    }

    public function updateSuccessStories(Request $request, $id){
         try {
            $newSuccessStory = $request->validate([
                'avatar' => 'string',
                'name' => 'string',
                'address' => 'string',
                'description' => 'string'
            ]);

            $successStory = SuccessStories::find($id);
            if (!$successStory) {
                return response()->json(['message' => 'SuccessStory Not Found!'], 404);
            }

            $successStory->update($newSuccessStory);
            return response()->json(['message' => 'Updated Successfully'], 200);
        } catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function deleteSuccessStories($id){
        try {
            $successStory = SuccessStories::find($id);
            if (!$successStory) {
                return response()->json(['message' => 'SuccessStory Not Found!'], 404);
            }
            $successStory->delete();
            return response()->json(['message' => 'SuccessStory Deleted Successfully'], 200);
        } catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

}
