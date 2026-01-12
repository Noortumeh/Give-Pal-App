<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicesRequest;
use App\Services\ServicesService;

class ServicesController extends Controller
{
    protected $servicesService;
    public function __construct(ServicesService $servicesService)
    {
        $this->servicesService = $servicesService;
    }

    public function getServices(){
        return $this->servicesService->getServices();
    }

    public function addServices(ServicesRequest $request){
        return $this->servicesService->addServices($request);
    }

    public function updateServices(ServicesRequest $request, $id){
        return $this->servicesService->updateServices($request, $id);
    }

    public function deleteServices($id){
        return $this->servicesService->deleteServices($id);
    }

    public function getServiceData($id){
        return $this->servicesService->getServiceData($id);
    }
}
