<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\MailerService;
use App\Assinante;

class MailerController extends Controller
{
    private $mailerService;

    public function __construct(MailerService $mailerService)
    {
        $this->mailerService = $mailerService;
    }

    public function emailManutencao($id)
    {
        $assinante = Assinante::find($id);

        if ($assinante == null) {
            return redirect()->back()
                ->with([
                    'status' => false,
                    'message' => 'Usuário não encontrado. Nenhum e-mail foi enviado.'
                ]);
        }

        $this->mailerService->enviarEmailManutencao($assinante);

        return redirect()->back()
            ->with([
                'status' => true,
                'message' => "O e-mail foi enviado com sucesso para '$assinante->email'."
            ]);
    }
}
