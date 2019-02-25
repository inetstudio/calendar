<?php

namespace InetStudio\Calendar\Services\Common;

use Carbon\Carbon;
use League\Fractal\Manager;
use Illuminate\Support\Collection;
use InetStudio\AdminPanel\Serializers\SimpleDataArraySerializer;
use InetStudio\Calendar\Contracts\Services\Common\EventsServiceContract;

/**
 * Class EventsService.
 */
class EventsService implements EventsServiceContract
{
    /**
     * @var string
     */
    protected $transformer;

    /**
     * EventsService constructor.
     *
     * @param string $transformer
     */
    public function __construct(string $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * Получаем события.
     *
     * @param $startPeriod
     * @param $endPeriod
     *
     * @return array
     *
     * @throws \Throwable
     */
    public function getEvents($startPeriod, $endPeriod): array
    {
        $types = config('calendar');

        $manager = new Manager();
        $manager->setSerializer(new SimpleDataArraySerializer());

        $events = [];

        foreach ($types as $module => $type) {
            $items = $this->getEventsItemsByType($type, $startPeriod, $endPeriod);

            $resource = (app()->makeWith($this->transformer, [
                'module' => $module,
                'field' => $type['field'],
            ]))->transformCollection($items);

            $data = $manager->createData($resource)->toArray();

            $events = array_merge($events, $data);
        }

        return $events;
    }

    /**
     * Получаем события.
     *
     * @param array $type
     * @param $startPeriod
     * @param $endPeriod
     *
     * @return Collection
     */
    public function getEventsItemsByType(array $type, $startPeriod, $endPeriod): Collection
    {
        $model = app()->make($type['model']);

        if ($startPeriod) {
            $time = Carbon::parse($startPeriod)->toDateTimeString();
            $model = $model->where($type['field']['name'], '>=', $time);
        }

        if ($endPeriod) {
            $time = Carbon::parse($endPeriod)->toDateTimeString();
            $model = $model->where($type['field']['name'], '<=', $time);
        }

        $items = $model->get();

        return $items;
    }
}
