<?php

namespace InetStudio\CalendarPackage\Events\Contracts\Http\Controllers\Back;

use InetStudio\CalendarPackage\Events\Contracts\Http\Requests\Back\Resource\IndexRequestContract;
use InetStudio\CalendarPackage\Events\Contracts\Http\Requests\Back\Resource\UpdateRequestContract;
use InetStudio\CalendarPackage\Events\Contracts\Http\Responses\Back\Resource\IndexResponseContract;
use InetStudio\CalendarPackage\Events\Contracts\Http\Responses\Back\Resource\UpdateResponseContract;

/**
 * Interface ResourceControllerContract.
 */
interface ResourceControllerContract
{
    /**
     * Список объектов.
     *
     * @param  IndexRequestContract  $request
     * @param  IndexResponseContract  $response
     *
     * @return IndexResponseContract
     */
    public function index(IndexRequestContract $request, IndexResponseContract $response): IndexResponseContract;

    /**
     * Обновляем объект.
     *
     * @param  UpdateRequestContract  $request
     * @param  UpdateResponseContract  $response
     *
     * @return UpdateResponseContract
     */
    public function update(UpdateRequestContract $request, UpdateResponseContract $response): UpdateResponseContract;
}
