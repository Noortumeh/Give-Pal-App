<?php

namespace App\Http\Controllers;

use App\Services\ServicesService;
use Illuminate\Http\Request;

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
}
