<?php

namespace InetStudio\CalendarPackage\Events\Http\Controllers\Front;

use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use InetStudio\CalendarPackage\Events\Contracts\Http\Controllers\Front\ResourceControllerContract;
use InetStudio\CalendarPackage\Events\Contracts\Http\Requests\Front\Resource\IndexRequestContract;
use InetStudio\CalendarPackage\Events\Contracts\Http\Responses\Front\Resource\IndexResponseContract;

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
}
