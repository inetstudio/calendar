<?php

namespace InetStudio\Calendar\Http\Responses\Front\Events;

use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Support\Responsable;
use InetStudio\Calendar\Contracts\Http\Responses\Front\Events\GetEventsResponseContract;

/**
 * Class GetEventsResponse.
 */
class GetEventsResponse implements GetEventsResponseContract, Responsable
{
    /**
     * @var array
     */
    protected $result;

    /**
     * SendCommentResponse constructor.
     *
     * @param array $result
     */
    public function __construct(array $result)
    {
        $this->result = $result;
    }

    /**
     * Возвращаем ответ при получении событий.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function toResponse($request): JsonResponse
    {
        return response()->json($this->result);
    }
}
