<?php

namespace InetStudio\CalendarPackage\Events\Http\Responses\Back\Resource;

use InetStudio\CalendarPackage\Events\Contracts\Services\Back\ItemsServiceContract;
use InetStudio\CalendarPackage\Events\Contracts\Http\Requests\Back\Resource\UpdateRequestContract;
use InetStudio\CalendarPackage\Events\Contracts\Http\Responses\Back\Resource\UpdateResponseContract;

/**
 * Class UpdateResponse.
 */
class UpdateResponse implements UpdateResponseContract
{
    /**
     * @var ItemsServiceContract
     */
    protected $resourceService;

    /**
     * IndexResponse constructor.
     *
     * @param  ItemsServiceContract  $resourceService
     */
    public function __construct(ItemsServiceContract $resourceService)
    {
        $this->resourceService = $resourceService;
    }

    /**
     * Возвращаем ответ при изменении события.
     *
     * @param  UpdateRequestContract  $request
     *
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $type = $request->get('type');
        $id = $request->get('id');
        $time = $request->get('time');

        $result = $this->resourceService->update($type, $id, $time);

        return response()->json($result);
    }
}
