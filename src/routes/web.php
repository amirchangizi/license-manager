<?php
    /*
    | Author : amir changizi
    | Email  : amir.changizi.5@gmail.com
    | Date   : 2024-02-29
    | TIME   : 12:42 PM
    */

    Route::group(['middleware' => ['auth']], function () {
        Route::get('package-skeleton', [LicenseManagerController::class, 'index'])->name('package.license.tab.index');
    });
