<?php

namespace App\Http\Controllers;

use App\Http\Requests\{SectionContentRequest, SectionRequest};
use App\Http\Resources\ContentHomeResource;
use App\Models\Sections;
use App\Services\ContentHomeService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SectionsController extends Controller
{
    protected $contentHomeService;
    public function __construct(ContentHomeService $contentHomeService)
    {
        $this->contentHomeService = $contentHomeService;
    }

    public function getSectionsData()
    {
        return $this->contentHomeService->getSectionsData();
    }

    public function addSections(SectionRequest $request)
    {
        return $this->contentHomeService->addSections($request);
    }

    public function addSectionContent(SectionContentRequest $request)
    {
        return $this->contentHomeService->addSectionContent($request);
    }

    public function deleteSection($id)
    {
        return $this->contentHomeService->deleteSection($id);
    }

    public function search($keyWord)
    {
        return $this->contentHomeService->search($keyWord);
    }
}
