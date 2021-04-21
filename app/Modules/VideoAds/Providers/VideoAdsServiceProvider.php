<?php

namespace App\Modules\VideoAds\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

use App\Modules\VideoAds\Repositories\VideoAdsInterface;
use App\Modules\VideoAds\Repositories\VideoAdsRepository;
use App\Modules\VideoAds\Repositories\VideoAdsLogInterface;
use App\Modules\VideoAds\Repositories\VideoAdsLogRepository;

class VideoAdsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */

    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->videoAdsRegister();
        $this->videoAdsLogRegister();
    }


    public function videoAdsRegister(){
        $this->app->bind(
            VideoAdsInterface::class,
            VideoAdsRepository::class
        );
    }

    public function videoAdsLogRegister(){
        $this->app->bind(
            VideoAdsLogInterface::class,
            VideoAdsLogRepository::class
        );
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('videoads.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'videoads'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/videoads');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/videoads';
        }, \Config::get('view.paths')), [$sourcePath]), 'videoads');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/videoads');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'videoads');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'videoads');
        }
    }

    /**
     * Register an additional directory of factories.
     * 
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
