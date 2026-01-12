<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsService;
    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function getNews()
    {
        return $this->newsService->getNews();
    }

    public function getNewsData($id)
    {
        return $this->newsService->getNewsData($id);
    }

    public function addNews(NewsRequest $request)
    {
        return $this->newsService->addNews($request);
    }
    
    public function updateNewsById(NewsRequest $request, $id)
    {
        return $this->newsService->updateNewsById($request, $id);
    }

    public function deleteNewsById($id)
    {
        return $this->newsService->deleteNewsById($id);
    }
}
