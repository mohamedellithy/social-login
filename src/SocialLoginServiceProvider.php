<?php

namespace Social\SocialLogin;

use Illuminate\Support\ServiceProvider;

class SocialLoginServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->make('Social\SocialLogin\socialapp\FacebookController');
        $this->app->make('Social\SocialLogin\socialapp\GoogleController');
        $this->app->make('Social\SocialLogin\socialapp\LinkedInController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //

        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }
}
