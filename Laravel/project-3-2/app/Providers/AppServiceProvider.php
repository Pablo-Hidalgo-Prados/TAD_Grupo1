<?php

namespace App\Providers;

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
        $this->app->singleton('translator', function ($app) {
            $transPath = resource_path('lang');
    
            $loader = new \Illuminate\Translation\FileLoader($app['files'], $transPath);
    
            $translator = new \Illuminate\Translation\Translator($loader, $app['config']['app.locale']);
    
            $translator->addNamespace('messages', $transPath . '/messages');
    
            return $translator;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        
        $this->loadTranslationsFrom(resource_path('lang'), 'messages');
    }
}
