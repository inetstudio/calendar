<?php

namespace InetStudio\CalendarPackage\Events\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

/**
 * Class BindingsServiceProvider.
 */
class BindingsServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
    * @var  array
    */
    public $bindings = [
        'InetStudio\CalendarPackage\Events\Contracts\Http\Controllers\Back\ResourceControllerContract' => 'InetStudio\CalendarPackage\Events\Http\Controllers\Back\ResourceController',
        'InetStudio\CalendarPackage\Events\Contracts\Http\Controllers\Front\ResourceControllerContract' => 'InetStudio\CalendarPackage\Events\Http\Controllers\Front\ResourceController',
        'InetStudio\CalendarPackage\Events\Contracts\Http\Requests\Back\Resource\IndexRequestContract' => 'InetStudio\CalendarPackage\Events\Http\Requests\Back\Resource\IndexRequest',
        'InetStudio\CalendarPackage\Events\Contracts\Http\Requests\Back\Resource\UpdateRequestContract' => 'InetStudio\CalendarPackage\Events\Http\Requests\Back\Resource\UpdateRequest',
        'InetStudio\CalendarPackage\Events\Contracts\Http\Requests\Front\Resource\IndexRequestContract' => 'InetStudio\CalendarPackage\Events\Http\Requests\Front\Resource\IndexRequest',
        'InetStudio\CalendarPackage\Events\Contracts\Http\Responses\Back\Resource\IndexResponseContract' => 'InetStudio\CalendarPackage\Events\Http\Responses\Back\Resource\IndexResponse',
        'InetStudio\CalendarPackage\Events\Contracts\Http\Responses\Back\Resource\UpdateResponseContract' => 'InetStudio\CalendarPackage\Events\Http\Responses\Back\Resource\UpdateResponse',
        'InetStudio\CalendarPackage\Events\Contracts\Http\Responses\Front\Resource\IndexResponseContract' => 'InetStudio\CalendarPackage\Events\Http\Responses\Front\Resource\IndexResponse',
        'InetStudio\CalendarPackage\Events\Contracts\Services\Back\ItemsServiceContract' => 'InetStudio\CalendarPackage\Events\Services\Back\ItemsService',
        'InetStudio\CalendarPackage\Events\Contracts\Services\Common\ItemsServiceContract' => 'InetStudio\CalendarPackage\Events\Services\Common\ItemsService',
        'InetStudio\CalendarPackage\Events\Contracts\Services\Front\ItemsServiceContract' => 'InetStudio\CalendarPackage\Events\Services\Front\ItemsService',
        'InetStudio\CalendarPackage\Events\Contracts\Transformers\Back\ItemTransformerContract' => 'InetStudio\CalendarPackage\Events\Transformers\Back\ItemTransformer',
        'InetStudio\CalendarPackage\Events\Contracts\Transformers\Front\ItemTransformerContract' => 'InetStudio\CalendarPackage\Events\Transformers\Front\ItemTransformer',
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
