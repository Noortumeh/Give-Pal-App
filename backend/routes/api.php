<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProjectsController, ServicesController, UserController};

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
