<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{MediaController, NewsController, ProjectsController, ServicesController, StatisticsController, SuccessPartnersController, SuccessStoriesController, UserController};

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

// Services Admin Routes
Route::post('/services',[ServicesController::class, 'addServices'])->middleware('auth:sanctum');
Route::put('/services/{id}',[ServicesController::class, 'updateServices'])->middleware('auth:sanctum');
Route::delete('/services/{id}',[ServicesController::class, 'deleteServices'])->middleware('auth:sanctum');

// Projects Admin Routes
Route::post('/projects',[ProjectsController::class, 'addProjects'])->middleware('auth:sanctum');
Route::put('/projects/{id}',[ProjectsController::class, 'updateProject'])->middleware('auth:sanctum');
Route::delete('/projects/{id}',[ProjectsController::class, 'deleteProject'])->middleware('auth:sanctum');

// Success Stories Routes
Route::post('/success-stories',[SuccessStoriesController::class, 'addSuccessStories'])->middleware('auth:sanctum');
Route::put('/success-stories/{id}',[SuccessStoriesController::class, 'updateSuccessStories'])->middleware('auth:sanctum');
Route::delete('/success-stories/{id}',[SuccessStoriesController::class, 'deleteSuccessStories'])->middleware('auth:sanctum');

// Statistics Routes
Route::post('/statistics',[StatisticsController::class, 'addStatistics'])->middleware('auth:sanctum');
Route::put('/statistics/{id}',[StatisticsController::class, 'updateStatistics'])->middleware('auth:sanctum');
Route::delete('/statistics/{id}',[StatisticsController::class, 'deleteStatistics'])->middleware('auth:sanctum');

// News Routes
Route::post('/news',[NewsController::class, 'addNews'])->middleware('auth:sanctum');
Route::put('/news/{id}',[NewsController::class, 'updateNewsById'])->middleware('auth:sanctum');
Route::delete('/news/{id}',[NewsController::class, 'deleteNewsById'])->middleware('auth:sanctum');

//Media Routes
Route::post('/media',[MediaController::class, 'addMedia'])->middleware('auth:sanctum');
Route::put('/media/{id}',[MediaController::class, 'updateMediaById'])->middleware('auth:sanctum');
Route::delete('/media/{id}',[MediaController::class, 'deleteMediaById'])->middleware('auth:sanctum');

// Success Partners Routes
Route::post('/success-partners',[SuccessPartnersController::class, 'addSuccessPartners'])->middleware('auth:sanctum');
Route::put('/success-partners/{id}',[SuccessPartnersController::class, 'updateSuccessPartnersById'])->middleware('auth:sanctum');
Route::delete('/success-partners/{id}',[SuccessPartnersController::class, 'deleteSuccessPartnersById'])->middleware('auth:sanctum');