<?php

namespace InetStudio\CalendarPackage\Calendar\Http\Controllers\Front;

use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use InetStudio\CalendarPackage\Calendar\Contracts\Http\Requests\Front\Resource\ShowRequestContract;
use InetStudio\CalendarPackage\Calendar\Contracts\Http\Controllers\Front\ResourceControllerContract;
use InetStudio\CalendarPackage\Calendar\Contracts\Http\Responses\Front\Resource\ShowResponseContract;

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
