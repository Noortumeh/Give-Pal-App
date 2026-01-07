<?php

namespace App\Services;

use App\Models\Services;
use Exception;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class ServicesService
{

    public function getServices()
    {
        try {
            $Services = Services::all();
            if (!$Services->isEmpty()) {
                return response()->json($Services, 200);
            } else {
                return response()->json('There is No Services Found', 404);
            }
        } catch (Exception $error) {
            return response()->json('Server Error: ' + $error, 500);
        }
    }

    public function getServiceData($id)
    {
        try {
            $service = Services::find($id);
            if (!$service) {
                return response()->json(['message' => 'Service Not Found!'], 209);
            }
            return response(['data' => $service, 'message' => 'Service Found Successfully!'],200);

        } catch (Exception $error) {
            return response()->json('Server Error: ' + $error, 500);
        }
    }

    public function addServices(Request $request)
    {
        try {
            $service = $request->validate([
                'icon' => 'string',
                'title' => 'string',
                'description' => 'string'
            ]);
            Services::create($service);
            return response(['message' => 'created successfully', 'data' => $service], 200);
        } catch (Exception $error) {
            return response()->json('Server Error: ' + $error, 500);
        }
    }

    public function updateServices(Request $request, $id)
    {
        try {
            $newService = $request->validate([
                'icon' => 'string',
                'title' => 'string',
                'description' => 'string'
            ]);

            $service = Services::find($id);
            if (!$service) {
                return response()->json(['message' => 'Service Not Found!'], 209);
            }

            $service->update($newService);
            return response()->json(['message' => 'Updated Successfully'], 200);
        } catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function deleteServices($id)
    {
        try {
            $service = Services::find($id);
            if (!$service) {
                return response()->json(['message' => 'Service Not Found!'], 209);
            }
            $service->delete();
            return response()->json(['message' => 'Service Deleted Successfully'], 200);
        } catch (Exception $error) {
            return response()->json($error, 500);
        }
    }
}
