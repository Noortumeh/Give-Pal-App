<?php

namespace App\Services;

use App\Models\SuccessPartners;
use Exception;
use Illuminate\Http\Request;

class SuccessPartnersService
{

    public function getSuccessPartners()
    {
        try {
            $data = SuccessPartners::all();
            if (!$data->isEmpty()) {
                return response()->json($data, 200);
            } else {
                return response()->json('There is No Success Partners Found', 404);
            }
        } catch (Exception $error) {
            return response()->json('Server Error', 500);
        }
    }

    public function getSuccessPartnersData($id)
    {
        try {
            $successPartners = SuccessPartners::find($id);
            if (!$successPartners) {
                return response()->json(['message' => 'Media Not Found!'], 404);
            }
            return response(['data' => $successPartners, 'message' => 'Media Found Successfully!'], 200);
        } catch (Exception $error) {
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }
    public function addSuccessPartners(Request $request)
    {
        try {
            $validateData = $request->validate([
                'icon' => 'string',
            ]);
            SuccessPartners::create($validateData);
            return response(['message' => 'Created successfully', 'data' => $validateData], 200);
        } catch (Exception $error) {
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }
    public function updateSuccessPartnersById(Request $request, $id)
    {
        try {
            $validatedRequest = $request->validate([
                'icon' => 'string',
            ]);
            $prevSuccessPartner = SuccessPartners::find($id);
            if (!$prevSuccessPartner) {
                return response()->json(['message' => 'Success Partner Data Not Found!'], 404);
            }

            $prevSuccessPartner->update($validatedRequest);
            return response()->json(['message' => 'Updated Successfully'], 200);
        } catch (Exception $error) {
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }
    public function deleteSuccessPartnersById($id) {
         try {
            $prevSuccessPartner = SuccessPartners::find($id);
            if (!$prevSuccessPartner) {
                return response()->json(['message' => 'Success Partner Data Not Found!'], 404);
            }
            $prevSuccessPartner->delete();
            return response()->json(['message' => 'Success Partner Deleted Successfully'], 200);
        } catch (Exception $error) {
            return response()->json(['message: ' => 'Server Error', $error], 500);
        }
    }
}
