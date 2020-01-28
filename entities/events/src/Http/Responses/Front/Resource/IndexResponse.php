<?php

namespace InetStudio\CalendarPackage\Events\Http\Responses\Front\Resource;

use League\Fractal\Manager;
use InetStudio\CalendarPackage\Events\Contracts\Services\Front\ItemsServiceContract;
use InetStudio\AdminPanel\Base\Contracts\Serializers\SimpleDataArraySerializerContract;
use InetStudio\CalendarPackage\Events\Contracts\Transformers\Front\ItemTransformerContract;
use InetStudio\CalendarPackage\Events\Contracts\Http\Requests\Front\Resource\IndexRequestContract;
use InetStudio\CalendarPackage\Events\Contracts\Http\Responses\Front\Resource\IndexResponseContract;

/**
 * Class IndexResponse.
 */
class IndexResponse implements IndexResponseContract
{
    /**
     * @var ItemsServiceContract
     */
    protected $resourceService;

    /**
     * @var SimpleDataArraySerializerContract
     */
    protected $serializer;

    /**
     * @var ItemTransformerContract
     */
    protected $transformer;

    /**
     * IndexResponse constructor.
     *
     * @param  ItemsServiceContract  $resourceService
     * @param  SimpleDataArraySerializerContract  $serializer
     * @param  ItemTransformerContract  $transformer
     */
    public function __construct(
        ItemsServiceContract $resourceService,
        SimpleDataArraySerializerContract $serializer,
        ItemTransformerContract $transformer
    ) {
        $this->resourceService = $resourceService;
        $this->serializer = $serializer;
        $this->transformer = $transformer;
    }

    /**
     * Возвращаем ответ при получении объектов.
     *
     * @param  IndexRequestContract  $request
     *
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $startPeriod = $request->get('start');
        $endPeriod = $request->get('end');

        $manager = new Manager();
        $manager->setSerializer($this->serializer);

        $items = $this->resourceService->getItems($startPeriod, $endPeriod);

        $resource = $this->transformer->transformCollection($items);
        $data = $manager->createData($resource)->toArray();

        return response()->json($data);
    }
}
