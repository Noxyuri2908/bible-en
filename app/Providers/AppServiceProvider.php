<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Models\language;
use App\Models\version;
use App\Models\book;
use App\Models\chapter;
use App\Models\plan;
use App\Models\planRef;
use Carbon\Carbon;

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
        $data = array();
        $enVersions = version::where('language_id',15)->get();
        $defaultVersion = version::where('language_id',15)->first();
        $plans = plan::all();
        $now = Carbon::now();

        $data['enVersions'] = $enVersions;
        $data['now'] = $now;
        $data['plans'] = $plans;
        $data['defaultVersion'] = $defaultVersion;

        View::share('dataViewShare', $data);
    }
}
