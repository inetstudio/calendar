<?php

namespace InetStudio\CalendarPackage\Events\Services\Back;

use Carbon\Carbon;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\CalendarPackage\Events\Contracts\Services\Back\ItemsServiceContract;
use InetStudio\CalendarPackage\Events\Services\Common\ItemsService as CommonItemsService;

/**
 * Class ItemsService.
 */
class ItemsService extends CommonItemsService implements ItemsServiceContract
{
    /**
     * Обновляем объект.
     *
     * @param $type
     * @param $id
     * @param $time
     *
     * @return array
     *
     * @throws BindingResolutionException
     */
    public function update($type, $id, $time): array
    {
        $types = config('calendar_package_calendar');

        if (! isset($types[$type])) {
            return [
                'success' => false,
                'message' => 'Недопустимый тип материала',
            ];
        }

        $model = app()->make($types[$type]['model']);

        $item = $model::find($id);

        if (! $item) {
            return [
                'success' => false,
                'message' => 'Материал не найден',
            ];
        }

        if ($item) {
            $newTime = Carbon::parse($time);

            $item->update([
                $types[$type]['field']['name'] => $newTime->format('d.m.Y H:i'),
            ]);

            return [
                'success' => true,
                'message' => 'Материал изменен',
            ];
        }
    }
}
