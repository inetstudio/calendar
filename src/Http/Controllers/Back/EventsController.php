<?php

namespace InetStudio\Calendar\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InetStudio\Calendar\Contracts\Http\Controllers\Back\EventsControllerContract;
use InetStudio\Calendar\Contracts\Http\Responses\Back\Events\GetEventsResponseContract;
use InetStudio\Calendar\Contracts\Http\Responses\Back\Events\ChangeEventResponseContract;

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
        $eventsService = app()->make('InetStudio\Calendar\Contracts\Services\Back\EventsServiceContract');

        $startPeriod = $request->get('start');
        $endPeriod = $request->get('end');

        $events = $eventsService->getEvents($startPeriod, $endPeriod);

        return app()->makeWith(GetEventsResponseContract::class, [
            'result' => $events,
        ]);
    }

    /**
     * Изменяем время события.
     *
     * @param Request $request
     *
     * @return ChangeEventResponseContract
     */
    public function changeEvent(Request $request): ChangeEventResponseContract
    {
        $eventsService = app()->make('InetStudio\Calendar\Contracts\Services\Back\EventsServiceContract');

        $type = $request->get('type');
        $id = $request->get('id');
        $time = $request->get('time');

        $result = $eventsService->changeEvent($type, $id, $time);

        return app()->makeWith(ChangeEventResponseContract::class, compact('result'));
    }
}
