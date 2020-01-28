<?php

namespace InetStudio\CalendarPackage\Calendar\Http\Controllers\Back;

use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use InetStudio\CalendarPackage\Calendar\Contracts\Http\Requests\Back\Resource\ShowRequestContract;
use InetStudio\CalendarPackage\Calendar\Contracts\Http\Controllers\Back\ResourceControllerContract;
use InetStudio\CalendarPackage\Calendar\Contracts\Http\Responses\Back\Resource\ShowResponseContract;

/**
 * Class ResourceController.
 */
class ResourceController extends Controller implements ResourceControllerContract
{
    /**
     * Календарь событий.
     *
     * @param  ShowRequestContract  $request
     * @param  ShowResponseContract  $response
     *
     * @return ShowResponseContract
     */
    public function show(ShowRequestContract $request, ShowResponseContract $response): ShowResponseContract
    {
        return $response;
    }
}
