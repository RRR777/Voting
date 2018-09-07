<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use App\Models\Setting;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        //$currentTime = Carbon::now();
        $currentTime = Carbon::create(2018, 9, 15, 00, 00, 00);

        $setting = Setting::find(1);
        View::share('getPeriodDates', $setting);

        if ($currentTime->gt($setting->nomination_start_date) && $currentTime->lt($setting->nomination_end_date)) {
            View::share('whatPeriodIs', 'nomination');
        } elseif ($currentTime->gt($setting->voting_start_date) && $currentTime->lt($setting->voting_end_date)) {
            View::share('whatPeriodIs', 'voting');
        } elseif ($currentTime->lt($setting->nomination_start_date)) {
            View::share('whatPeriodIs', 'before nomination');
        } elseif ($currentTime->gt($setting->voting_end_date)) {
            View::share('whatPeriodIs', 'after voting');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
