<?php
    /*
    | Author : amir changizi
    | Email  : amir.changizi.5@gmail.com
    | Date   : 2024-02-29
    | TIME   : 12:25 PM
    */

    namespace Rasaco\LicenseManager;

    use Illuminate\Support\ServiceProvider;
    use Illuminate\Support\Facades\Route;

    class LicenseManagerServiceProvider extends ServiceProvider
    {
        protected $namespace = '\Rasaco\LicenseManager\Http\Controllers';

        
        public function register()
        {
            // Nothing is registered at this time
        }

        public function boot()
        {

            //Route::pushMiddlewareToGroup('web', AddToMenus::class);

            $this->publishes([
                __DIR__.'/config/license-manager.php' => config_path('license-manager.php'),
            ],'license-config');
            

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(__DIR__ . '/routes/web.php');

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(__DIR__ . '/routes/api.php');
        }

    }
