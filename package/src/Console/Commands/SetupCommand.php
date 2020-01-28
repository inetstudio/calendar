<?php

namespace InetStudio\CalendarPackage\Console\Commands;

use InetStudio\AdminPanel\Base\Console\Commands\BaseSetupCommand;

/**
 * Class SetupCommand.
 */
class SetupCommand extends BaseSetupCommand
{
    /**
     * Имя команды.
     *
     * @var string
     */
    protected $name = 'inetstudio:calendar-package:setup';

    /**
     * Описание команды.
     *
     * @var string
     */
    protected $description = 'Setup calendar package';

    /**
     * Инициализация команд.
     */
    protected function initCommands(): void
    {
        $this->calls = [
            [
                'type' => 'artisan',
                'description' => 'Calendar setup',
                'command' => 'inetstudio:calendar-package:calendar:setup',
            ],
        ];
    }
}
