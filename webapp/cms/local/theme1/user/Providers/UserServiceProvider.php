<?php

namespace cms\user\Providers;

use Illuminate\Support\ServiceProvider;
use cms\user\Middleware\UserAuthForApi;

use Route;
use Cms;
class UserServiceProvider extends ServiceProvider
{
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

           // $this->registerViews();
            //$this->registerRoot();
            //$this->registerAdminRoot();
        $this->registerMiddleware();
        $this->registerApiRoutes();

    }

    public function registerRoot()
    {
        Route::prefix('')
            ->middleware(['web'])
            ->namespace('cms\user\Controllers')
            ->group(__DIR__ . '/../routes.php');


    }
    public function registerAdminRoot()
    {

        Route::prefix('administrator')
            ->middleware(['web','Admin'])
            ->namespace('cms\user\Controllers')
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

        $viewPath = resource_path('views/modules/user');

        //$sourcePath = __DIR__.'/../resources/views';
        $Path = __DIR__.'/../resources/views';
        $sourcePath = base_path().'/cms/local/'.$theme.'/user/resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);
        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/user';
        }, [$Path]), [$sourcePath,$Path]), 'user');
    }
    /*
     * register middleware
     */
    public function registerMiddleware()
    {
        app('router')->aliasMiddleware('UserAuthForApi', UserAuthForApi::class);
    }
    /*
     * register api routes
     */
    public function registerApiRoutes() {

        Route::prefix('api')
            // ->middleware(['UserAuthForApi'])
            ->namespace('cms\user\Controllers')
            ->group(__DIR__ . '/../apiroutes.php');
    }

}
