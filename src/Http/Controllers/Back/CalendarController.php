<?php

namespace InetStudio\Calendar\Http\Controllers\Back;

use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    /**
     * Календарь событий.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.module.calendar::back.pages.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getEvents(Request $request): JsonResponse
    {
        $types = config('calendar');

        $events = [];

        foreach ($types as $module => $type) {
            $model = new $type['model']();

            if ($request->filled('start')) {
                $time = Carbon::parse($request->get('start'))->toDateTimeString();
                $model = $model->where($type['fields']['time'], '>=', $time);
            }

            if ($request->filled('end')) {
                $time = Carbon::parse($request->get('end'))->toDateTimeString();
                $model = $model->where($type['fields']['time'], '<=', $time);
            }

            $items = $model->get();

            foreach ($items as $item) {
                $status = $item->status;

                $events[] = [
                    'id' => $item->id,
                    'type' => $module,
                    'title' => $item[$type['fields']['title']],
                    'start' => (string) $item[$type['fields']['time']],
                    'className' => 'btn-'.(($status) ? $status->color_class : 'default'),
                    'tooltip' => view('admin.module.'.$module.'::back.partials.calendar.tooltip', [
                        'item' => $item,
                    ])->render(),
                ];
            }
        }

        return response()->json($events);
    }

    /**
     * Изменяем время события.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function changeEvent(Request $request): JsonResponse
    {
        $type = $request->get('type');
        $id = $request->get('id');
        $time = $request->get('time');

        $types = config('calendar');

        if (! isset($types[$type])) {
            return response()->json([
                'success' => false,
                'message' => 'Недопустимый тип материала',
            ]);
        }

        $model = new $types[$type]['model']();

        if (! is_null($id) && $id > 0 && $item = $model::find($id)) {
            $newTime = Carbon::parse($time);

            $item->update([
                $types[$type]['fields']['time'] => $newTime->format('d.m.Y H:i'),
            ]);

            $result = [
                'success' => true,
                'message' => 'Материал изменен',
            ];
        } else {
            $result = [
                'success' => false,
                'message' => 'Материал не найден',
            ];
        }

        return response()->json($result);
    }
}
