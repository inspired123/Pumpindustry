<?php

namespace cms\events\Providers;

use Illuminate\Support\ServiceProvider;
use Route;
use Cms;
class EventsServiceProvider extends ServiceProvider
{
    /*
     * artisan command
     */
    protected $commands = [
        'cms\events\Console\Commands\EventsBotCommand'
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerViews();
        $this->registerRoot();
        $this->registerAdminRoot();
        $this->registerApiRoutes();
        //$this->registerMiddleware();
        $this->registerCommand();

    }

    public function registerRoot()
    {
        Route::prefix('')
            ->middleware(['web'])
            ->namespace('cms\events\Controllers')
            ->group(__DIR__ . '/../routes.php');


    }
    public function registerAdminRoot()
    {

        Route::prefix('administrator')
            ->middleware(['web','Admin'])
            ->namespace('cms\events\Controllers')
            ->group(__DIR__ . '/../adminroutes.php');


    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $theme = Cms::getCurrentTheme();

        $viewPath = resource_path('views/modules/events');

        //$sourcePath = __DIR__.'/../resources/views';
        $Path = __DIR__.'/../resources/views';
        $sourcePath = base_path().'/cms/local/'.$theme.'/events/resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);
        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/events';
        }, [$Path]), [$sourcePath,$Path]), 'events');
    }
    /*
     * register middleware
     */
    public function registerMiddleware()
    {
        app('router')->aliasMiddleware('MiddleWareName', middlewarepath::class);
    }

    /*
     * register api routes
     */
    public function registerApiRoutes() {

        Route::prefix('api')
            // ->middleware(['UserAuthForApi'])
            ->namespace('cms\events\Controllers')
            ->group(__DIR__ . '/../apiroutes.php');
    }

    /*
     * register commands
     */
    protected function registerCommand()
    {
        $this->commands($this->commands);
    }

}
