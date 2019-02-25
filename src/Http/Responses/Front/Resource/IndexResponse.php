<?php

namespace InetStudio\Calendar\Http\Responses\Front\Resource;

use Illuminate\View\View;
use Illuminate\Contracts\Support\Responsable;
use InetStudio\Calendar\Contracts\Http\Responses\Front\Resource\IndexResponseContract;

/**
 * Class IndexResponse.
 */
class IndexResponse implements IndexResponseContract, Responsable
{
    /**
     * @var array
     */
    protected $data;

    /**
     * IndexResponse constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Возвращаем ответ при открытии списка объектов.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return View
     */
    public function toResponse($request): View
    {
        return view('admin.module.calendar::front.pages.index', $this->data);
    }
}
