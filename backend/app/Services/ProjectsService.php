<?php

namespace App\Services;

use App\Facades\StoreFile;
use Illuminate\Http\Request;
use App\Models\Projects;
use Exception;
use Illuminate\Support\Facades\Storage;

class ProjectsService
{

    public function getProjects()
    {
        try {
            $projects = Projects::all();
            if (!$projects->isEmpty()) {
                return response()->json($projects, 200);
            } else {
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
                return response()->json(['message' => 'Project Not Found!'], 404);
            }
            return response(['data' => $project, 'message' => 'Project Found Successfully!'], 200);
        } catch (Exception $error) {
            return response()->json('Server Error: ' + $error, 500);
        }
    }

    public function addProjects(Request $request)
    {
        try {
            $project = $request->validate([
                'image' => 'file|max:2048|mimes:png,jpg,jpeg,gif,ico',
                'title' => 'string',
                'description' => 'string'
            ]);

            if ($request->hasFile('image')) {
                $project['image'] = StoreFile::storeFile($request->image, 'projects-images');
            }
            Projects::create($project);
            return response(['message' => 'Created Project successfully', 'data' => $project], 200);
        } catch (Exception $error) {
            return response()->json(['Server Error',  $error->getMessage()], 500);
        }
    }

    public function deleteProject($id)
    {
        try {
            $project = Projects::find($id);
            if (!$project) {
                return response()->json(['message' => 'Project Not Found!'], 404);
            }
            StoreFile::deleteStoredFile($project->image);
            $project->delete();
            return response()->json(['message' => 'Project Deleted Successfully'], 200);
        } catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function updateProject(Request $request, $id)
    {
        try {
            $newProject = $request->validate([
                'image' => 'file|max:2048|mimes:png,jpg,jpeg,gif,ico',
                'title' => 'string',
                'description' => 'string'
            ]);

            $project = Projects::find($id);
            if (!$project) {
                return response()->json(['message' => 'Project Not Found!'], 404);
            }

            if ($request->hasFile('image')) {
                $newProject['image'] = StoreFile::updateStoredFile($project->image, $request->image, 'projects-images');
            }

            $project->update($newProject);
            return response()->json(['message' => 'Updated Successfully'], 200);
        } catch (Exception $error) {
            return response()->json($error, 500);
        }
    }
}
