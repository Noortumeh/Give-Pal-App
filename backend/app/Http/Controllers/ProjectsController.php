<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectsRequest;
use App\Services\ProjectsService;

class ProjectsController extends Controller
{
    protected $projectsService;
    public function __construct(ProjectsService $projectsService){
        return $this->projectsService = $projectsService;
    }

    public function getProjects(){
        return $this->projectsService->getProjects();        
    }

    public function getProjectData($id){
        return $this->projectsService->getProjectData($id);        
    }

    public function addProjects(ProjectsRequest $request){
        return $this->projectsService->addProjects($request);        
    }

    public function deleteProject($id){
        return $this->projectsService->deleteProject($id);        
    }

    public function updateProject(ProjectsRequest $request, $id){
        return $this->projectsService->updateProject($request, $id);        
    }
}
