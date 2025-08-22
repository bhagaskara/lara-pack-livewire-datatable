<?php

namespace LaraPack\LivewireDatatable;

use Illuminate\Support\ServiceProvider;

class LivewireDatatableProvider extends ServiceProvider
{
    public function register()
    {
        // Merge the package's config with the application's config
        $this->mergeConfigFrom(
            __DIR__ . '/../config/livewire-datatable.php',
            'livewire-datatable'
        );
    }

    public function boot()
    {
        // Muat file view dari folder "resources/views"
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'lara-pack.livewire-datatable');

        // Publish the package's config file to the application's config directory
        $this->publishes([
            __DIR__ . '/../config/livewire-datatable.php' => config_path('livewire-datatable.php'),
        ], 'lara-pack/livewire-datatable');
    }
}
