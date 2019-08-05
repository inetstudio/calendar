<?php

namespace InetStudio\Calendar\Http\Controllers\Front;

use Illuminate\Http\Request;
use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use InetStudio\Calendar\Contracts\Http\Controllers\Front\EventsControllerContract;
use InetStudio\Calendar\Contracts\Http\Responses\Front\Events\GetEventsResponseContract;

/**
 * Class EventsController.
 */
class EventsController extends Controller implements EventsControllerContract
{
    /**
     * Получаем события.
     *
     * @param Request $request
     *
     * @return GetEventsResponseContract
     */
    public function getEvents(Request $request): GetEventsResponseContract
    {
        $eventsService = app()->make('InetStudio\Calendar\Contracts\Services\Front\EventsServiceContract');

        $startPeriod = $request->get('start');
        $endPeriod = $request->get('end');

        $events = $eventsService->getEvents($startPeriod, $endPeriod);

        return app()->makeWith(GetEventsResponseContract::class, [
            'result' => $events,
        ]);
    }
}
