<?php

Route::group(['namespace' => 'InetStudio\Calendar\Http\Controllers\Back'], function () {
    Route::group(['middleware' => 'web', 'prefix' => 'back'], function () {
        Route::group(['middleware' => 'back.auth'], function () {
            Route::get('calendar/events', 'CalendarController@getEvents')->name('back.calendar.events');
            Route::post('calendar/change', 'CalendarController@changeEvent')->name('back.calendar.change');
            Route::resource('calendar', 'CalendarController', ['only' => [
                'index',
            ], 'as' => 'back']);
        });
    });
});
