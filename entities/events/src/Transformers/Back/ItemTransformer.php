<?php

namespace InetStudio\CalendarPackage\Events\Transformers\Back;

use Throwable;
use InetStudio\AdminPanel\Base\Transformers\BaseTransformer;
use InetStudio\CalendarPackage\Events\Contracts\Transformers\Back\ItemTransformerContract;

/**
 * Class ItemTransformer.
 */
class ItemTransformer extends BaseTransformer implements ItemTransformerContract
{
    /**
     * @var array
     */
    protected $config;

    /**
     * ItemTransformer constructor.
     */
    public function __construct()
    {
        $this->config = config('calendar_package_calendar', []);
    }

    /**
     * Подготовка данных для отображения в таблице.
     *
     * @param object $item
     *
     * @return array
     *
     * @throws Throwable
     */
    public function transform($item): array
    {
        $configKey = $item->getTable();

        if (! isset($this->config[$configKey])) {
            return [];
        }

        $status = $item['status'];

        return [
            'id' => $item['id'],
            'type' => $configKey,
            'title' => $item[$this->config[$configKey]['field']['title']],
            'start' => (string) $item[$this->config[$configKey]['field']['name']],
            'className' => 'btn-'.($status['color_class'] ?? 'default'),
            'tooltip' => view(
                $this->config[$configKey]['views_namespace'].'::back.partials.calendar_package.events.tooltip',
                compact('item')
            )->render(),
        ];
    }
}
