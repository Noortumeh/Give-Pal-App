<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Projects;
use Exception;

class ProjectsService
{

    public function getProjects()
    {
        try {
            $projects = Projects::all();
            if (!$projects->isEmpty()) {
                return response()->json($projects, 200);
            }else{
                return response()->json('There is No Projects Found', 404);
            }
        } catch (Exception $error) {
            return response()->json('Server Error', 500);
        }
    }
}
