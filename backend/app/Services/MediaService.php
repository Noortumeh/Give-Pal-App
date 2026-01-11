<?php

namespace App\Services;

use App\Models\Media;
use Exception;
use Illuminate\Http\Request;

class MediaService
{
    public function getMedia()
    {
        try {
            $data = Media::all();
            if (!$data->isEmpty()) {
                return response()->json($data, 200);
            } else {
                return response()->json('There is No Media Found', 404);
            }
        } catch (Exception $error) {
            return response()->json('Server Error', 500);
        }
    }

    public function getMediaData($id)
    {
        try {
            $mediaData = Media::find($id);
            if (!$mediaData) {
                return response()->json(['message' => 'Media Not Found!'], 404);
            }
            return response(['data' => $mediaData, 'message' => 'Media Found Successfully!'], 200);
        } catch (Exception $error) {
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }

    public function addMedia(Request $request)
    {
        try {
            $validateData = $request->validate([
                'date' => 'date',
                'title' => 'string',
                'dsecription' => 'string',
                'media' => 'string',
            ]);
            Media::create($validateData);
            return response(['message' => 'Created successfully', 'data' => $validateData], 200);
        } catch (Exception $error) {
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }

    public function updateMediaById(Request $request, $id)
    {
        try {
            $validatedRequest = $request->validate([
                'date' => 'date',
                'title' => 'string',
                'dsecription' => 'string',
                'media' => 'string',
            ]);
            $prevMedia = Media::find($id);
            if (!$prevMedia) {
                return response()->json(['message' => 'Media Data Not Found!'], 404);
            }

            $prevMedia->update($validatedRequest);
            return response()->json(['message' => 'Updated Successfully'], 200);
        } catch (Exception $error) {
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }

    public function deleteMediaById($id)
    {
        try {
            $prevMedia = Media::find($id);
            if (!$prevMedia) {
                return response()->json(['message' => 'Media Data Not Found!'], 404);
            }
            $prevMedia->delete();
            return response()->json(['message' => 'Media Deleted Successfully'], 200);
        } catch (Exception $error) {
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }
}
