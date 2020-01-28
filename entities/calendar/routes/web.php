<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'namespace' => 'InetStudio\CalendarPackage\Calendar\Contracts\Http\Controllers\Back',
        'middleware' => ['web', 'back.auth'],
        'prefix' => 'back',
    ],
    function () {
        Route::get('calendar-package/calendar', 'ResourceControllerContract@show')->name('back.calendar-package.calendar.show');
    }
);

Route::group([
    'namespace' => 'InetStudio\CalendarPackage\Calendar\Contracts\Http\Controllers\Front',
    'middleware' => ['web', 'role:admin|smm'],
    'prefix' => 'module',
], function () {
    Route::get('calendar-package/calendar', 'ResourceControllerContract@show')->name('front.calendar-package.calendar.show');
});
