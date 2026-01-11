<?php

namespace App\Http\Controllers;

use App\Services\MediaService;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    protected $media;
    public function __construct(MediaService $mediaService)
    {
        $this->media = $mediaService;
    }
    public function getMedia(){
        return $this->media->getMedia();
    }

    public function getMediaData($id){
        return $this->media->getMediaData($id);
    }

    public function addMedia(Request $request){
        return $this->media->addMedia($request);
    }

    public function updateMediaById(Request $request, $id){
        return $this->media->updateMediaById($request, $id);
    }

    public function deleteMediaById($id){
        return $this->media->deleteMediaById($id);
    }
}
