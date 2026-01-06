<?php

namespace App\Http\Controllers;

use App\Services\SuccessPartnersService;
use Illuminate\Http\Request;

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
}
