<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class SendVerificationEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:send-verification {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía un correo de verificación a un usuario';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("No se encontró un usuario con el correo: {$email}");
            return;
        }

        event(new Registered($user));
        $this->info("Correo de verificación enviado a: {$email}");
    }
}
