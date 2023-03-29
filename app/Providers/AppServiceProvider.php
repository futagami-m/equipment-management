<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\App; // 追加
use Illuminate\Support\Facades\URL; // 追加

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if(App::environment(['production'])){
            URL::forceScheme('https');
        }
    }
}
