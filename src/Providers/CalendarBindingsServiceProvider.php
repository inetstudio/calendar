<?php

namespace InetStudio\Calendar\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

/**
 * Class CalendarBindingsServiceProvider.
 */
class CalendarBindingsServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
    * @var  array
    */
    public $bindings = [
        'InetStudio\Calendar\Contracts\Transformers\Back\EventTransformerContract' => 'InetStudio\Calendar\Transformers\Back\EventTransformer',
        'InetStudio\Calendar\Contracts\Transformers\Front\EventTransformerContract' => 'InetStudio\Calendar\Transformers\Front\EventTransformer',
        'InetStudio\Calendar\Contracts\Http\Responses\Back\Events\GetEventsResponseContract' => 'InetStudio\Calendar\Http\Responses\Back\Events\GetEventsResponse',
        'InetStudio\Calendar\Contracts\Http\Responses\Back\Events\ChangeEventResponseContract' => 'InetStudio\Calendar\Http\Responses\Back\Events\ChangeEventResponse',
        'InetStudio\Calendar\Contracts\Http\Responses\Back\Resource\IndexResponseContract' => 'InetStudio\Calendar\Http\Responses\Back\Resource\IndexResponse',
        'InetStudio\Calendar\Contracts\Http\Responses\Front\Events\GetEventsResponseContract' => 'InetStudio\Calendar\Http\Responses\Front\Events\GetEventsResponse',
        'InetStudio\Calendar\Contracts\Http\Responses\Front\Resource\IndexResponseContract' => 'InetStudio\Calendar\Http\Responses\Front\Resource\IndexResponse',
        'InetStudio\Calendar\Contracts\Http\Controllers\Back\EventsControllerContract' => 'InetStudio\Calendar\Http\Controllers\Back\EventsController',
        'InetStudio\Calendar\Contracts\Http\Controllers\Back\CalendarControllerContract' => 'InetStudio\Calendar\Http\Controllers\Back\CalendarController',
        'InetStudio\Calendar\Contracts\Http\Controllers\Front\EventsControllerContract' => 'InetStudio\Calendar\Http\Controllers\Front\EventsController',
        'InetStudio\Calendar\Contracts\Http\Controllers\Front\CalendarControllerContract' => 'InetStudio\Calendar\Http\Controllers\Front\CalendarController',
        'InetStudio\Calendar\Contracts\Services\Back\EventsServiceContract' => 'InetStudio\Calendar\Services\Back\EventsService',
        'InetStudio\Calendar\Contracts\Services\Common\EventsServiceContract' => 'InetStudio\Calendar\Services\Common\EventsService',
        'InetStudio\Calendar\Contracts\Services\Front\EventsServiceContract' => 'InetStudio\Calendar\Services\Front\EventsService',
    ];

    /**
     * Получить сервисы от провайдера.
     *
     * @return  array
     */
    public function provides()
    {
        return array_keys($this->bindings);
    }
}
