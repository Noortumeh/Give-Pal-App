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

    public function getProjectData($id){
        return $this->projectsService->getProjectData($id);        
    }

    public function addProjects(Request $request){
        return $this->projectsService->addProjects($request);        
    }

    public function deleteProject($id){
        return $this->projectsService->deleteProject($id);        
    }

    public function updateProject(Request $request, $id){
        return $this->projectsService->updateProject($request, $id);        
    }
}
