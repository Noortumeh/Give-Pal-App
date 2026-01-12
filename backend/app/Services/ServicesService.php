<?php

namespace App\Services;

use App\Facades\StoreFile;
use App\Http\Requests\ServicesRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Services;
use Exception;

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
            return response(['data' => new ServiceResource($service), 'message' => 'Service Found Successfully!'], 200);
        } catch (Exception $error) {
            return response()->json(['message' => 'Server Error', $error], 500);
        }
    }

    public function addServices(ServicesRequest $request)
    {
        try {
            $service = $request->validated();

            if ($request->hasFile('icon')) {
                $service['icon'] = StoreFile::storeFile($request->icon, 'services-icons');
            }

            Services::create($service);
            return response(['message' => 'created successfully', 'data' => $service], 200);
        } catch (Exception $error) {
            return response()->json(['message' => 'Server Error', $error], 500);
        }
    }

    public function updateServices(ServicesRequest $request, $id)
    {
        try {
            $newService = $request->validated();

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
