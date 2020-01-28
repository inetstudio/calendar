<?php

namespace InetStudio\CalendarPackage\Events\Http\Controllers\Back;

use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use InetStudio\CalendarPackage\Events\Contracts\Http\Controllers\Back\ResourceControllerContract;
use InetStudio\CalendarPackage\Events\Contracts\Http\Requests\Back\Resource\IndexRequestContract;
use InetStudio\CalendarPackage\Events\Contracts\Http\Requests\Back\Resource\UpdateRequestContract;
use InetStudio\CalendarPackage\Events\Contracts\Http\Responses\Back\Resource\IndexResponseContract;
use InetStudio\CalendarPackage\Events\Contracts\Http\Responses\Back\Resource\UpdateResponseContract;

/**
 * Class ResourceController.
 */
class ResourceController extends Controller implements ResourceControllerContract
{
    /**
     * Список объектов.
     *
     * @param  IndexRequestContract  $request
     * @param  IndexResponseContract  $response
     *
     * @return IndexResponseContract
     */
    public function index(IndexRequestContract $request, IndexResponseContract $response): IndexResponseContract
    {
        return $response;
    }

    /**
     * Обновляем объект.
     *
     * @param  UpdateRequestContract  $request
     * @param  UpdateResponseContract  $response
     *
     * @return UpdateResponseContract
     */
    public function update(UpdateRequestContract $request, UpdateResponseContract $response): UpdateResponseContract
    {
        return $response;
    }
}
