<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use A17\Twill\Facades\TwillNavigation;
use A17\Twill\View\Components\Navigation\NavigationLink;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(220);
        TwillNavigation::addLink(
            NavigationLink::make()->forModule('pages')
        );
        TwillNavigation::addLink(
            NavigationLink::make()->forModule('menuLink')
        );
        TwillNavigation::addLink(
            NavigationLink::make()->forModule('projects')
              ->setChildren([
                NavigationLink::make()->forModule('projects')
                  ->setChildren([
                    NavigationLink::make()->forModule('projectCustomers'),
                  ]),
                NavigationLink::make()->forModule('clients'),
                NavigationLink::make()->forModule('industries'),
                NavigationLink::make()->forModule('studios'),
              ]),
        );
    }
}
