<?php

namespace App\Services;

use App\Facades\StoreFile;
use App\Http\Requests\ProjectsRequest;
use App\Http\Resources\ProjectsResource;
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
            return response(['data' => new ProjectsResource($project), 'message' => 'Project Found Successfully!'], 200);
        } catch (Exception $error) {
            return response()->json('Server Error: ' + $error, 500);
        }
    }

    public function addProjects(ProjectsRequest $request)
    {
        try {
            $project = $request->validated();
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

    public function updateProject(ProjectsRequest $request, $id)
    {
        try {
            $newProject = $request->validated();
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
