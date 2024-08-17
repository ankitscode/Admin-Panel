<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\HomeController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.admin.layout', function ($view) {
            $notifications = HomeController::newOrderNotification();
            $view->with('notifications', $notifications['notifications'])
             ->with('newProductInformation', $notifications['newProductInformation']);
        });
    }
}
