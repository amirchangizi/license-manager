<?php
    /*
    | Author : amir changizi
    | Email  : amir.changizi.5@gmail.com
    | Date   : 2024-02-29
    | TIME   : 2:27 PM
    */

    namespace Rasaco\LicenseManager\Http\Middleware;

    use Closure;
    use Lavary\Menu\Facade as Menu;

    class AddToMenus
    {
        public function handle($request, Closure $next)
        {

            // Add a menu option to the top to point to our page

            $menu = Menu::get('topnav');
            $menu->add(__('License'), ['route' => 'package.license.tab.index']);

            return $next($request);
        }
    }
