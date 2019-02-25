<?php

namespace InetStudio\Calendar\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use InetStudio\Calendar\Contracts\Http\Controllers\Front\CalendarControllerContract;
use InetStudio\Calendar\Contracts\Http\Responses\Front\Resource\IndexResponseContract;

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
