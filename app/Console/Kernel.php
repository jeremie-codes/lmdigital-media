<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Str;

class Kernel extends ConsoleKernel
{
    // Dans app/Console/Kernel.php
protected function schedule(Schedule $schedule)
{
    $schedule->call(function () {
        $users = \App\Models\User::where('email', 'validate@taxe')->get();

        foreach ($users as $user) {
            $user->name = Str::random(6); // Génère une clé de 6 caractères
            $user->save();
        }
    })->everyTwoMinutes();
}

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}