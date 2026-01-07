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

    public function getProjectData($id)
    {
        try {
            $project = Projects::find($id);
            if (!$project) {
                return response()->json(['message' => 'Project Not Found!'], 209);
            }
            return response(['data' => $project, 'message' => 'Project Found Successfully!'],200);

        } catch (Exception $error) {
            return response()->json('Server Error: ' + $error, 500);
        }
    }

    public function addProjects(Request $request){
        try {
            $project = $request->validate([
                'image' => 'string',
                'title' => 'string',
                'description' => 'string'
            ]);
            Projects::create($project);
            return response(['message' => 'Created successfully', 'data' => $project], 200);
        } catch (Exception $error) {
            return response()->json('Server Error: ' + $error, 500);
        }
    }

    public function deleteProject($id){
         try {
            $project = Projects::find($id);
            if (!$project) {
                return response()->json(['message' => 'Project Not Found!'], 209);
            }
            $project->delete();
            return response()->json(['message' => 'Project Deleted Successfully'], 200);
        } catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function updateProject(Request $request, $id){
        try {
            $newProject = $request->validate([
                'image' => 'string',
                'title' => 'string',
                'description' => 'string'
            ]);

            $project = Projects::find($id);
            if (!$project) {
                return response()->json(['message' => 'Project Not Found!'], 209);
            }

            $project->update($newProject);
            return response()->json(['message' => 'Updated Successfully'], 200);
        } catch (Exception $error) {
            return response()->json($error, 500);
        }
    }
}
