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
    public function getStatisticsData($id){
        return $this->statisticsService->getStatisticsData($id);
    }
    public function addStatistics(Request $request){
        return $this->statisticsService->addStatistics($request);
    }
    public function updateStatistics(Request $request, $id){
        return $this->statisticsService->updateStatistics($request, $id);
    }
    public function deleteStatistics($id){
        return $this->statisticsService->deleteStatistics($id);
    }
}
