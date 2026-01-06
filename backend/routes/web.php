<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{MediaController, NewsController, ProjectsController, ServicesController, StatisticsController, SuccessPartnersController, SuccessStoriesController};

//Services Routes
Route::get('/services',[ServicesController::class, 'getServices']);
// Route::post('/services',[ServicesController::class, 'addServices']);
// Route::put('/services/{id}',[ServicesController::class, 'updateServices']);
// Route::delete('/services/{id}',[ServicesController::class, 'deleteServices']);

//Projects Routes
Route::get('/projects', [ProjectsController::class, 'getProjects']);

//Success Stories Routes
Route::get('/success-stories', [SuccessStoriesController::class, 'getSuccessStories']);

//Statistics Routes
Route::get('/statistics', [StatisticsController::class, 'getStatistics']);

//News Routes
Route::get('/news', [NewsController::class, 'getNews']);

//Media Routes
Route::get('/media', [MediaController::class, 'getMedia']);

//Success Partners Routes
Route::get('/success-partners', [SuccessPartnersController::class, 'getSuccessPartners']);




