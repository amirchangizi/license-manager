<?php
    /*
    | Author : amir changizi
    | Email  : amir.changizi.5@gmail.com
    | Date   : 2024-02-29
    | TIME   : 12:42 PM
    */

    use Rasaco\LicenseManager\Http\Controllers\LicenseManagerController;

    Route::group(['middleware' => ['auth']], function () {
        Route::get('license-manager', [LicenseManagerController::class, 'index'])->name('package.license.tab.index');
        Route::post('license-manager', [LicenseManagerController::class, 'store']);
    });
