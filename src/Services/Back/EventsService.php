<?php

namespace InetStudio\Calendar\Services\Back;

use Carbon\Carbon;
use InetStudio\Calendar\Contracts\Services\Back\EventsServiceContract;
use InetStudio\Calendar\Services\Common\EventsService as CommonEventsService;

/**
 * Class EventsService.
 */
class EventsService extends CommonEventsService implements EventsServiceContract
{
    /**
     * EventsService constructor.
     */
    public function __construct()
    {
        parent::__construct('InetStudio\Calendar\Contracts\Transformers\Back\EventTransformerContract');
    }

    /**
     * Изменяем время события.
     *
     * @param $type
     * @param $id
     * @param $time
     *
     * @return array
     */
    public function changeEvent($type, $id, $time): array
    {
        $types = config('calendar');

        if (! isset($types[$type])) {
            return [
                'success' => false,
                'message' => 'Недопустимый тип материала',
            ];
        }

        $model = app()->make($types[$type]['model']);

        $item = $model::find($id);

        if ($item) {
            $newTime = Carbon::parse($time);

            $item->update([
                $types[$type]['field']['name'] => $newTime->format('d.m.Y H:i'),
            ]);

            $result = [
                'success' => true,
                'message' => 'Материал изменен',
            ];
        } else {
            $result = [
                'success' => false,
                'message' => 'Материал не найден',
            ];
        }

        return $result;
    }
}
