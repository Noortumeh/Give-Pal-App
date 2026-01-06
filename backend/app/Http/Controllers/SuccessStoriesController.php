<?php

namespace App\Http\Controllers;

use App\Services\SuccessStoriesService;
use Illuminate\Http\Request;

class SuccessStoriesController extends Controller
{
    protected $successStories;
    public function __construct(SuccessStoriesService $successStories)
    {
        $this->successStories = $successStories;
    }

    public function getSuccessStories(){
        return $this->successStories->getSuccessStories();
    }
}
