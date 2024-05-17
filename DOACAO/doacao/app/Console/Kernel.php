<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // Adicione o agendamento da tarefa aqui
        //$schedule->command('limpar:reservas')->everyMinutes(); // Executar diariamente
        $schedule->call(function () {
            \Artisan::call('limpar:reservas');
        })->everyMinute();
    }
    

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
