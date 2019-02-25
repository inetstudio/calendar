<?php

namespace InetStudio\Calendar\Console\Commands;

use InetStudio\AdminPanel\Console\Commands\BaseSetupCommand;

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
    protected $name = 'inetstudio:calendar:setup';

    /**
     * Описание команды.
     *
     * @var string
     */
    protected $description = 'Setup calendar package';

    /**
     * Инициализация команд.
     *
     * @return void
     */
    protected function initCommands(): void
    {
        $this->calls = [
            [
                'type' => 'artisan',
                'description' => 'Publish config',
                'command' => 'vendor:publish',
                'params' => [
                    '--provider' => 'InetStudio\Calendar\Providers\CalendarServiceProvider',
                    '--tag' => 'config',
                ],
            ],
        ];
    }
}
