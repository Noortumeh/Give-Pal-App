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
}
