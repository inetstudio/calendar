<?php

Route::group([
    'namespace' => 'InetStudio\Calendar\Contracts\Http\Controllers\Back',
    'middleware' => ['web', 'back.auth'],
    'prefix' => 'back',
], function () {
    Route::get('calendar/events', 'EventsControllerContract@getEvents')->name('back.calendar.events');
    Route::post('calendar/change', 'EventsControllerContract@changeEvent')->name('back.calendar.change');

    Route::resource('calendar', 'CalendarControllerContract', ['only' => [
        'index',
    ], 'as' => 'back']);
});

Route::group([
    'namespace' => 'InetStudio\Calendar\Contracts\Http\Controllers\Front',
    'middleware' => ['web', 'role:admin|smm'],
    'prefix' => 'module',
], function () {
    Route::get('calendar/events', 'EventsControllerContract@getEvents')->name('front.calendar.events');

    Route::resource('calendar', 'CalendarControllerContract', ['only' => [
        'index',
    ], 'as' => 'front']);
});
