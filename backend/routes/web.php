<?php

use Illuminate\Support\Facades\{App, Route};
use Illuminate\Http\Request;
use App\Http\Controllers\{MediaController, NewsController, ProjectsController, ServicesController, StatisticsController, SuccessPartnersController, SuccessStoriesController, UserController};

//Services Routes
Route::get('/home-titles/{locale}',function($locale){
    if($locale === 'en'){
        // session()->put('locale', 'en');
        App::setLocale('en');
    }else{
        // session()->put('locale', 'ar');
        App::setLocale('ar');
    }
    return __('home.titles');
    // return redirect()->back();
});
Route::get('/services',[ServicesController::class, 'getServices']);
Route::get('/services/{id}',[ServicesController::class, 'getServiceData']);

//Projects Routes
Route::get('/projects', [ProjectsController::class, 'getProjects']);
Route::get('/projects/{id}', [ProjectsController::class, 'getProjectData']);

//Success Stories Routes
Route::get('/success-stories', [SuccessStoriesController::class, 'getSuccessStories']);
Route::get('/success-stories/{id}', [SuccessStoriesController::class, 'getSuccessStorieData']);

//Statistics Routes
Route::get('/statistics', [StatisticsController::class, 'getStatistics']);
Route::get('/statistics/{id}', [StatisticsController::class, 'getStatisticsData']);

//News Routes
Route::get('/news', [NewsController::class, 'getNews']);
Route::get('/news/{id}', [NewsController::class, 'getNewsData']);


//Media Routes
Route::get('/media', [MediaController::class, 'getMedia']);
Route::get('/media/{id}', [MediaController::class, 'getMediaData']);


//Success Partners Routes
Route::get('/success-partners', [SuccessPartnersController::class, 'getSuccessPartners']);
Route::get('/success-partners/{id}', [SuccessPartnersController::class, 'getSuccessPartnersData']);

Route::get('/', function(){
    return view('welcome');
});



