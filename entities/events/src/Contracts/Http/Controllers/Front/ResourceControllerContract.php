<?php

namespace InetStudio\CalendarPackage\Events\Contracts\Http\Controllers\Front;

use InetStudio\CalendarPackage\Events\Contracts\Http\Requests\Front\Resource\IndexRequestContract;
use InetStudio\CalendarPackage\Events\Contracts\Http\Responses\Front\Resource\IndexResponseContract;

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
}
