<?php

namespace InetStudio\CalendarPackage\Calendar\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class BindingsServiceProvider.
 */
class BindingsServiceProvider extends BaseServiceProvider implements DeferrableProvider
{
    /**
    * @var  array
    */
    public $bindings = [
        'InetStudio\CalendarPackage\Calendar\Contracts\Http\Controllers\Back\ResourceControllerContract' => 'InetStudio\CalendarPackage\Calendar\Http\Controllers\Back\ResourceController',
        'InetStudio\CalendarPackage\Calendar\Contracts\Http\Controllers\Front\ResourceControllerContract' => 'InetStudio\CalendarPackage\Calendar\Http\Controllers\Front\ResourceController',
        'InetStudio\CalendarPackage\Calendar\Contracts\Http\Requests\Back\Resource\ShowRequestContract' => 'InetStudio\CalendarPackage\Calendar\Http\Requests\Back\Resource\ShowRequest',
        'InetStudio\CalendarPackage\Calendar\Contracts\Http\Requests\Front\Resource\ShowRequestContract' => 'InetStudio\CalendarPackage\Calendar\Http\Requests\Front\Resource\ShowRequest',
        'InetStudio\CalendarPackage\Calendar\Contracts\Http\Responses\Back\Resource\ShowResponseContract' => 'InetStudio\CalendarPackage\Calendar\Http\Responses\Back\Resource\ShowResponse',
        'InetStudio\CalendarPackage\Calendar\Contracts\Http\Responses\Front\Resource\ShowResponseContract' => 'InetStudio\CalendarPackage\Calendar\Http\Responses\Front\Resource\ShowResponse',
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
