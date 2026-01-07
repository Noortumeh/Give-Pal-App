<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use App\Services\{MediaService, NewsService, ProjectsService, ServicesService, StatisticsService, SuccessPartnersService, SuccessStoriesService, UserService};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        App::bind(ServicesService::class, function () {
            return new ServicesService();
        });

        App::bind(ProjectsService::class, function () {
            return new ProjectsService();
        });

        App::bind(SuccessStoriesService::class, function () {
            return new SuccessStoriesService();
        });

        App::bind(StatisticsService::class, function () {
            return new StatisticsService();
        });

        App::bind(NewsService::class, function () {
            return new NewsService();
        });

        App::bind(MediaService::class, function () {
            return new MediaService();
        });

        App::bind(SuccessPartnersService::class, function () {
            return new SuccessPartnersService();
        });

        App::bind(UserService::class, function () {
            return new UserService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
