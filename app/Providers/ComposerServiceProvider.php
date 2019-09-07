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

        view()->composer(
            'client.recent_view',
            'App\Http\ViewComposers\ViewComposer@recent_view'
        );

        view()->composer(
            'client.collection.decide',
            'App\Http\ViewComposers\ViewComposer@decide'
        );

        view()->composer(
            'layouts.client.footer',
            'App\Http\ViewComposers\ViewComposer@footer'
        );
    }
}
