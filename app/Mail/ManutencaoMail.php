<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ManutencaoMail extends Mailable
{
    use Queueable, SerializesModels;

    private $assinante;
    private $isUrgent;

    public function __construct($assinante, $isUrgent)
    {
        $this->assinante = $assinante;
        $this->isUrgent = $isUrgent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Estamos em Manutenção! ;(';
        $subject = $this->isUrgent ? '[URGENTE] ' . mb_strtoupper($subject) : $subject;

        return $this
            ->subject($subject)
            ->markdown('emails.manutencao')
            ->with([
                'assinante' => $this->assinante,
                'urgente'   => $this->isUrgent
            ]);
    }
}
