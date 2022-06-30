<?php

namespace App\Providers;

use App\Models\Language;
use App\Models\Setting;
use App\Models\SocialMedia;
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
        $settings=Setting::firstOrFail();
        $socials=SocialMedia::get();
        view()->share([
            'languages'=>$languages,
            'settings'=>$settings,
            'socials'=>$socials
        ]);
    }
}
