<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/9
 * Time: 上午10:36
 */
namespace eDoctor\Meeting;

use Illuminate\Support\ServiceProvider;


class MeetingProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/config.php' => config_path('meeting.php')], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config.php', 'meeting');

        $this->app->singleton('eDoctor\Meeting\MeetingClient', function ($app) {
            return (new MeetingClient($app->config->get('meeting.TlkAppId'), $app->config->get('meeting.TlkAppSecret')))
                ->setApiBaseUri($app->config->get('meeting.TlkOpenApiBaseUri'));
        });
    }

}

