<?php

namespace App\Services;

use App\Facades\StoreFile;
use App\Http\Requests\MediaRequest;
use App\Models\Media;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function addMedia(MediaRequest $request)
    {
        try {
            $validateData = $request->validated();
            if ($request->hasFile('media')) {
                $validateData['media'] = StoreFile::storeFile($request->media, 'media');
            }
            //to get the image use this path: http://127.0.0.1:8000/storage/media/ZJqHLKlFttM15EsQBNc7Gn34h6nKg6dxoRx5T7HW.jpg

            Media::create($validateData);
            return response(['message' => 'Created successfully', 'data' => $validateData], 200);
        } catch (Exception $error) {
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }

    public function updateMediaById(MediaRequest $request, $id)
    {
        try {
            $validatedRequest = $request->validated();
            $prevMedia = Media::find($id);
            if (!$prevMedia) {
                return response()->json(['message' => 'Media Data Not Found!'], 404);
            }
            if ($request->hasFile('media')) {
                $validatedRequest['media'] = StoreFile::updateStoredFile($prevMedia->media, $request->media, 'media');
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

            StoreFile::deleteStoredFile($prevMedia->media);

            $prevMedia->delete();
            return response()->json(['message' => 'Media Deleted Successfully'], 200);
        } catch (Exception $error) {
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }
}
