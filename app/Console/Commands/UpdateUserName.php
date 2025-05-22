<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Str;

class UpdateUserName extends Command
{
    protected $signature = 'user:update-name';
    protected $description = 'Update user name every 5 seconds for users with email validate@taxe';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        while (true) {
            $users = User::where('email', 'validate@taxe')->get();

            foreach ($users as $user) {
                $user->name = Str::random(6); // Génère une clé de 6 caractères
                $user->save();
            }

            sleep(1200); // Attendre 5 secondes avant de relancer la boucle
        }
    }
}