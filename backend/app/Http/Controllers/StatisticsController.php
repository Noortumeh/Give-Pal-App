<?php

namespace App\Http\Controllers;

use App\Services\StatisticsService;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    protected $statisticsService;

    public function __construct(StatisticsService $statistics)
    {
        $this->statisticsService = $statistics;
    }

    public function getStatistics(){
        return $this->statisticsService->getStatistics();
    }
}
