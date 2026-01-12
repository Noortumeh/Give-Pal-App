<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuccessStoriesRequest;
use App\Services\SuccessStoriesService;

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
    public function getSuccessStorieData($id){
        return $this->successStories->getSuccessStorieData($id);
    }
    public function addSuccessStories(SuccessStoriesRequest $request){
        return $this->successStories->addSuccessStories($request);
    }
    public function updateSuccessStories(SuccessStoriesRequest $request, $id){
        return $this->successStories->updateSuccessStories($request, $id);
    }
    public function deleteSuccessStories($id){
        return $this->successStories->deleteSuccessStories($id);
    }
}
