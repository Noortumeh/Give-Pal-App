<?php

namespace App\Http\Controllers;

use App\Services\ProjectsService;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    protected $projectsService;
    public function __construct(ProjectsService $projectsService){
        return $this->projectsService = $projectsService;
    }

    public function getProjects(){
        return $this->projectsService->getProjects();        
    }
}
