<?php

namespace InetStudio\Calendar\Http\Responses\Back\Events;

use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Support\Responsable;
use InetStudio\Calendar\Contracts\Http\Responses\Back\Events\ChangeEventResponseContract;

/**
 * Class ChangeEventResponse.
 */
class ChangeEventResponse implements ChangeEventResponseContract, Responsable
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
     * Возвращаем ответ при изменении события.
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
