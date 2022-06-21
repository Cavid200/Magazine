<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFour();
        $languages=Language::where('isActive',1)->get();
        view()->share([
            'languages'=>$languages
        ]);
    }
}
