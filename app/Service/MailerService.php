<?php

namespace App\Service;

use App\Mail\ManutencaoMail;
use Illuminate\Support\Facades\Mail;

class MailerService {

    public function enviarEmailManutencao($assinante, $isUrgent = false)
    {
        Mail::to($assinante->email)
            ->send(new ManutencaoMail($assinante, $isUrgent));
    }
}
