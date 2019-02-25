<?php

namespace InetStudio\Calendar\Transformers\Front;

use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection as FractalCollection;
use InetStudio\Calendar\Contracts\Transformers\Front\EventTransformerContract;

/**
 * Class EventTransformer.
 */
class EventTransformer extends TransformerAbstract implements EventTransformerContract
{
    /**
     * @var string
     */
    protected $module;

    /**
     * @var array
     */
    protected $field;

    /**
     * EventTransformer constructor.
     * 
     * @param string $module
     * @param array $field
     */
    public function __construct(string $module, array $field)
    {
        $this->module = $module;
        $this->field = $field;
    }

    /**
     * Подготовка данных для отображения в таблице.
     *
     * @param object $item
     *
     * @return array
     *
     * @throws \Throwable
     */
    public function transform($item): array
    {
        $status = $item->status;

        return [
            'id' => $item->id,
            'type' => $this->module,
            'title' => $item[$this->field['title']],
            'start' => (string) $item[$this->field['name']],
            'className' => 'btn-'.(($status) ? $status->color_class : 'default'),
            'tooltip' => view('admin.module.'.$this->module.'::front.partials.calendar.tooltip', [
                'item' => $item,
            ])->render(),
        ];
    }

    /**
     * Обработка коллекции объектов.
     *
     * @param $items
     *
     * @return FractalCollection
     */
    public function transformCollection($items): FractalCollection
    {
        return new FractalCollection($items, $this);
    }
}
