<?php

namespace App\Providers;
use App\Models\property_categories;
use App\Models\business_categories;
use Illuminate\Support\Facades\View;
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
        //

        
        $cat =property_categories::all();
            View::share('cat', $cat); 


            $bus = business_categories::all();
            View::share('bus', $bus); 
    }
}
