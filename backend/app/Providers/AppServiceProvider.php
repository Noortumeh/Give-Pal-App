<?php

namespace App\Providers;

use Illuminate\Support\Facades\{App, RateLimiter};
use Illuminate\Support\ServiceProvider;
use App\Services\{ContentHomeService, MediaService, NewsService, ProjectsService, ServicesService, StatisticsService, StoreFileService, SuccessPartnersService, SuccessStoriesService, UserService};
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        App::bind(ContentHomeService::class, function () {
            return new ContentHomeService();
        });

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
        RateLimiter::for('limit3', function(Request $request){
            return Limit::perMinute(3)->by($request->user()?->id ?: $request->ip());
        });
    }
}
