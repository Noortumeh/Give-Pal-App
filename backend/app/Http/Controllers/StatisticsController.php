<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatisticsRequest;
use App\Services\StatisticsService;

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
    public function addStatistics(StatisticsRequest $request){
        return $this->statisticsService->addStatistics($request);
    }
    public function updateStatistics(StatisticsRequest $request, $id){
        return $this->statisticsService->updateStatistics($request, $id);
    }
    public function deleteStatistics($id){
        return $this->statisticsService->deleteStatistics($id);
    }
}
