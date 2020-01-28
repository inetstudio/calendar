<?php

namespace InetStudio\CalendarPackage\Events\Services\Common;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use InetStudio\AdminPanel\Base\Services\BaseService;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\CalendarPackage\Events\Contracts\Services\Common\ItemsServiceContract;

/**
 * Class ItemsService.
 */
class ItemsService extends BaseService implements ItemsServiceContract
{
    /**
     * ItemsService constructor.
     */
    public function __construct()
    {
        parent::__construct(null);
    }

    /**
     * Получаем события.
     *
     * @param $startPeriod
     * @param $endPeriod
     *
     * @return Collection
     *
     * @throws BindingResolutionException
     */
    public function getItems($startPeriod, $endPeriod): Collection
    {
        $types = config('calendar_package_calendar');

        $items = collect();

        foreach ($types as $module => $type) {
            $rawItems = $this->getItemsByType($type, $startPeriod, $endPeriod);

            $items = $items->merge($rawItems);
        }

        return $items;
    }

    /**
     * Получаем объекты по типу.
     *
     * @param array $type
     * @param $startPeriod
     * @param $endPeriod
     *
     * @return Collection
     *
     * @throws BindingResolutionException
     */
    public function getItemsByType(array $type, $startPeriod, $endPeriod): Collection
    {
        $model = app()->make($type['model']);

        if ($startPeriod) {
            $time = Carbon::parse($startPeriod)->toDateTimeString();
            $model = $model->where($type['field']['name'], '>=', $time);
        }

        if ($endPeriod) {
            $time = Carbon::parse($endPeriod)->toDateTimeString();
            $model = $model->where($type['field']['name'], '<=', $time);
        }

        return $model->get();
    }
}
