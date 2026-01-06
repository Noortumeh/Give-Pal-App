<?php

namespace App\Services;

use App\Models\Media;
use Exception;

class MediaService{
    public function getMedia(){
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
}