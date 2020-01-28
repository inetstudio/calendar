<?php

namespace InetStudio\CalendarPackage\Calendar\Console\Commands;

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
    protected $name = 'inetstudio:calendar-package:calendar:setup';

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
                'description' => 'Publish config',
                'command' => 'vendor:publish',
                'params' => [
                    '--provider' => 'InetStudio\CalendarPackage\Calendar\Providers\ServiceProvider',
                    '--tag' => 'config',
                ],
            ],
        ];
    }
}
