<?php

namespace Superbalist\LaravelLocalyticsPush;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Superbalist\LocalyticsPush\LocalyticsPush;

class LocalyticsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/localytics.php' => config_path('localytics.php'),
        ]);
    }

    /**
     * Register bindings in the container.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/localytics.php', 'localytics');

        $this->app->bind(LocalyticsPush::class, function ($app) {
            $client = new Client();
            $config = $app['config']['localytics'];
            return new LocalyticsPush($client, $config['app_id'], $config['api_key'], $config['api_secret']);
        });

        $this->app->bind('localytics', LocalyticsPush::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'localytics',
        ];
    }
}
