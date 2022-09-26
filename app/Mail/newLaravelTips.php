<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newLaravelTips extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\stdClass $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {        
        $this->to($this->user->email,$this->user->name);

        if ($this->user->tipoEmail == 'esqueci-senha') {
            $this->subject(subject: 'Esqueci Senha');

            return $this->view('email.esqueciSenha',[
                'user'=> $this->user
            ]);
        } else if ($this->user->tipoEmail == 'cadastro') {
            $this->subject(subject: 'Cadastro');

            return $this->view('email.cadastroUsuario',[
                'user'=> $this->user
            ]);
        }
        
        
    }
}
