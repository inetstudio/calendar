<?php

namespace InetStudio\CalendarPackage\Calendar\Http\Responses\Front\Resource;

use Illuminate\Http\Request;
use InetStudio\CalendarPackage\Calendar\Contracts\Http\Responses\Front\Resource\ShowResponseContract;

/**
 * Class ShowResponse.
 */
class ShowResponse implements ShowResponseContract
{
    /**
     * Возвращаем ответ при открытии списка объектов.
     *
     * @param  Request  $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return view('admin.module.calendar-package.calendar::front.pages.show');
    }
}
