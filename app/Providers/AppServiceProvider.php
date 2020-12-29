<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Include any validation errors automatically in each Inertia response
        Inertia::share('errors', function () {
            if (Session::get('errors')) {
                $bags = [];
                foreach (Session::get('errors')->getBags() as $bag => $error) {
                    $bags[$bag] = $error->getMessages();
                }
                return $bags;
            }
            return (object)[];
        });
    }
}
