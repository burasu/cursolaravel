<?php namespace HireMe\Components;

use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['fieldBfs']  = $this->app->share(function($app)
        {
            $fieldBuilder = new FieldBuilder();
            return $fieldBuilder;
        });
    }

} 