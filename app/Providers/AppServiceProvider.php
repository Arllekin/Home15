<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        view()->composer('*', function ($view) {
            $view->with('user', Auth::user());
        });
        Paginator::useBootstrap();

        $parameters = [
            'client_id'=>config('oauth.discord.client_id'),
            'redirect_uri'=>config('oauth.discord.callback_uri'),
            'response_type'=>'code',
            'scope'=>'identify email',
        ];
        View::share('oauth_login_discord', 'https://discord.com/api/oauth2/authorize?' . http_build_query($parameters,
                '', '&', 2)
        );
    }
}
