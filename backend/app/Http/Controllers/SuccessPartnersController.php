<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuccessPartnersRequest;
use App\Services\SuccessPartnersService;

class SuccessPartnersController extends Controller
{
    protected $successPartners;

    public function __construct(SuccessPartnersService $successPartners)
    {
        $this->successPartners = $successPartners;
    }

    public function getSuccessPartners(){
        return $this->successPartners->getSuccessPartners();
    }

    public function getSuccessPartnersData($id){
        return $this->successPartners->getSuccessPartnersData($id);
    }

    public function addSuccessPartners(SuccessPartnersRequest $request){
        return $this->successPartners->addSuccessPartners($request);
    }

    public function updateSuccessPartnersById(SuccessPartnersRequest $request, $id){
        return $this->successPartners->updateSuccessPartnersById($request, $id);
    }

    public function deleteSuccessPartnersById($id){
        return $this->successPartners->deleteSuccessPartnersById($id);
    }
}
