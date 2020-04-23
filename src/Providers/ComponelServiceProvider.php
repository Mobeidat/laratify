<?php

namespace Muhsenmaqsudi\Componel\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Muhsenmaqsudi\Componel\Commands\UiCommand;
use Muhsenmaqsudi\Componel\View\Components\Alert;
use Muhsenmaqsudi\Componel\View\Components\Badge;
use Muhsenmaqsudi\Componel\View\Components\Button;
use Muhsenmaqsudi\Componel\View\Components\Input;

class ComponelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                UiCommand::class
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'componel');
        $this->publishes([__DIR__ . '/../../resources/views' => resource_path('views/vendor/componel')], 'componel-views');

        $this->loadViewComponentsAs('componel', [
            Alert::class,
            Badge::class,
            Button::class,
            Input::class
        ]);

        Paginator::defaultView('pagination::default');
        Paginator::defaultSimpleView('pagination::simple-default');
    }

}
