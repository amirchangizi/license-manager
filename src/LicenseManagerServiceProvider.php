<?php
    /*
    | Author : amir changizi
    | Email  : amir.changizi.5@gmail.com
    | Date   : 2024-02-29
    | TIME   : 12:25 PM
    */

    namespace Rasa\LicenseManager;

    use Illuminate\Support\ServiceProvider;
    use Illuminate\Support\Facades\Route;

    class LicenseManagerServiceProvider extends ServiceProvider
    {
        protected $namespace = '\Rasa\LicenseManager\Http\Controllers';

        /**
         * If your plugin will provide any services, you can register them here.
         * See: https://laravel.com/docs/5.6/providers#the-register-method
         */
        public function register()
        {
            // Nothing is registered at this time
        }

        public function boot()
        {

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(__DIR__ . '/routes/web.php');

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(__DIR__ . '/routes/api.php');
        }

    }
