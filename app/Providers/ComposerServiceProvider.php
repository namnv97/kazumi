<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'layouts.client.header',
            'App\Http\ViewComposers\ViewComposer@compose'
        );

        view()->composer(
            'layouts.client.cart',
            'App\Http\ViewComposers\ViewComposer@cart_sidebar'
        );
    }
}
