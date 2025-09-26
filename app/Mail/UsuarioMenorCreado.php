<?php

namespace App\Mail;

use App\Models\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UsuarioMenorCreado extends Mailable
{
    use Queueable, SerializesModels;

    public Usuario $usuario;

    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    public function build()
    {
        return $this->subject('Alerta: Usuario menor de edad creado')
            ->view('emails.usuario_menor_creado')
            ->with([
                'usuario' => $this->usuario,
            ]);
    }
}



