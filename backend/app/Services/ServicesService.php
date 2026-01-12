<?php

namespace App\Services;

use App\Facades\StoreFile;
use App\Models\Services;
use Exception;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            return response()->json(['message' => 'Server Error', $error], 500);
        }
    }

    public function getServiceData($id)
    {
        try {
            $service = Services::find($id);
            if (!$service) {
                return response()->json(['message' => 'Service Not Found!'], 209);
            }
            return response(['data' => $service, 'message' => 'Service Found Successfully!'], 200);
        } catch (Exception $error) {
            return response()->json(['message' => 'Server Error', $error], 500);
        }
    }

    public function addServices(Request $request)
    {
        try {
            $service = $request->validate([
                'icon' => 'file|max:2048|mimes:png,jpg,jpeg,gif,ico',
                'title' => 'string',
                'description' => 'string'
            ]);

            if ($request->hasFile('icon')) {
                $service['icon'] = StoreFile::storeFile($request->icon, 'services-icons');
            }

            Services::create($service);
            return response(['message' => 'created successfully', 'data' => $service], 200);
        } catch (Exception $error) {
            return response()->json(['message' => 'Server Error', $error], 500);
        }
    }

    public function updateServices(Request $request, $id)
    {
        try {
            $newService = $request->validate([
                'icon' => 'file|max:2048|mimes:png,jpg,jpeg,gif,ico',
                'title' => 'string',
                'description' => 'string'
            ]);

            $service = Services::find($id);
            if (!$service) {
                return response()->json(['message' => 'Service Not Found!'], 404);
            }

            if ($request->hasFile('icon')) {
                $newService['icon'] = StoreFile::updateStoredFile($service->icon, $request->icon, 'services-icons');
            }

            $service->update($newService);
            return response()->json(['message' => 'Updated Successfully'], 200);
        } catch (Exception $error) {
            return response()->json(['message' => 'Server Error', $error], 500);
        }
    }

    public function deleteServices($id)
    {
        try {
            $service = Services::find($id);
            if (!$service) {
                return response()->json(['message' => 'Service Not Found!'], 404);
            }

            StoreFile::deleteStoredFile($service->icon);

            $service->delete();
            return response()->json(['message' => 'Service Deleted Successfully'], 200);
        } catch (Exception $error) {
            return response()->json(['message' => 'Server Error', $error], 500);
        }
    }
}
