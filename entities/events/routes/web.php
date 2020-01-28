<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'namespace' => 'InetStudio\CalendarPackage\Events\Contracts\Http\Controllers\Back',
        'middleware' => ['web', 'back.auth'],
        'prefix' => 'back',
    ],
    function () {
        Route::get('calendar-package/events', 'ResourceControllerContract@index')->name('back.calendar-package.events');
        Route::post('calendar-package/events/update', 'ResourceControllerContract@update')->name('back.calendar-package.events.update');
    }
);

Route::group(
    [
        'namespace' => 'InetStudio\CalendarPackage\Events\Contracts\Http\Controllers\Front',
        'middleware' => ['web', 'role:admin|smm'],
        'prefix' => 'module',
    ],
    function () {
        Route::get('calendar-package/events', 'ResourceControllerContract@index')->name('front.calendar-package.events');
    }
);
