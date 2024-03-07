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
    use Rasaco\LicenseManager\Http\Middleware\AddToMenus;
    use Rasaco\LicenseManager\Http\Middleware\LicenseManager;

    class LicenseManagerServiceProvider extends ServiceProvider
    {
        protected $namespace = '\Rasaco\LicenseManager\Http\Controllers';

        
        public function register()
        {
            // Nothing is registered at this time
        }

        public function boot()
        {
            $this->publishes([
                __DIR__.'/config/security-manager.php' => config_path('security-manager.php'),
            ],'security-manager');


            if(auth()->user() && in_array(auth()->id() ,config('security-manager.users')))
            {
                Route::pushMiddlewareToGroup('web', AddToMenus::class);
            }

            Route::pushMiddlewareToGroup('web', LicenseManager::class);

            $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'license-manager');

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(__DIR__ . '/routes/web.php');

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(__DIR__ . '/routes/api.php');
        }

    }
