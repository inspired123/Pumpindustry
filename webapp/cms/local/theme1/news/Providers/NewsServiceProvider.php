<?php

namespace cms\news\Providers;

use Illuminate\Support\ServiceProvider;
use Route;
use Cms;
class NewsServiceProvider extends ServiceProvider
{

    /*
     * artisan command
     */
    protected $commands = [
        'cms\news\Console\Commands\NewsBotCommand',
        'cms\news\Console\Commands\MailAlertCommand'
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
        //$this->registerMiddleware();
        $this->registerApiRoutes();
        $this->registerCommand();

    }

    public function registerRoot()
    {
        Route::prefix('')
            ->middleware(['web'])
            ->namespace('cms\news\Controllers')
            ->group(__DIR__ . '/../routes.php');


    }
    public function registerAdminRoot()
    {

        Route::prefix('administrator')
            ->middleware(['web','Admin'])
            ->namespace('cms\news\Controllers')
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

        $viewPath = resource_path('views/modules/news');

        //$sourcePath = __DIR__.'/../resources/views';
        $Path = __DIR__.'/../resources/views';
        $sourcePath = base_path().'/cms/local/'.$theme.'/news/resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);
        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/news';
        }, [$Path]), [$sourcePath,$Path]), 'news');
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
            ->namespace('cms\news\Controllers')
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
