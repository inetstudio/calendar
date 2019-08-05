<?php

namespace InetStudio\Calendar\Http\Controllers\Back;

use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use InetStudio\Calendar\Contracts\Http\Controllers\Back\CalendarControllerContract;
use InetStudio\Calendar\Contracts\Http\Responses\Back\Resource\IndexResponseContract;

/**
 * Class CalendarController.
 */
class CalendarController extends Controller implements CalendarControllerContract
{
    /**
     * Календарь событий.
     *
     * @return IndexResponseContract
     */
    public function index(): IndexResponseContract
    {
        return app()->makeWith(IndexResponseContract::class, [
            'data' => [],
        ]);
    }
}
