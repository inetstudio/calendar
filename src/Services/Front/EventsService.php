<?php

namespace InetStudio\Calendar\Services\Front;

use InetStudio\Calendar\Contracts\Services\Front\EventsServiceContract;
use InetStudio\Calendar\Services\Common\EventsService as CommonEventsService;

/**
 * Class EventsService.
 */
class EventsService extends CommonEventsService implements EventsServiceContract
{
    /**
     * EventsService constructor.
     */
    public function __construct()
    {
        parent::__construct('InetStudio\Calendar\Contracts\Transformers\Front\EventTransformerContract');
    }
}
