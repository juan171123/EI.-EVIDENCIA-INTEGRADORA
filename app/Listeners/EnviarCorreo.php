<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Mail;
use App\Mail\AlertaLoginCorreo;

class EnviarCorreo
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(login $event): void
    {
        //recibir la informacion del usuario
        $user = $event->user;

        //enviar el correo con la informacion del usuario
        Mail::to($user)->send(new AlertaLoginCorreo($user));
    }
}
