<?php

namespace App\Console\Commands;

use App\Assinante;
use App\Service\MailerService;
use Illuminate\Console\Command;

class EmailManutencaoCommand extends Command
{
    protected $signature = 'email:manutencao
                            {email : E-mail do assinante}
                            {--urgente : Define se o e-mail é ou não urgente}';

    protected $description = 'Envia um e-mail de manutenção para o usuário';

    protected $mailerService;

    public function __construct(MailerService $mailerService)
    {
        $this->mailerService = $mailerService;
        parent::__construct();
    }

    public function handle()
    {
        $email = $this->argument('email');
        $isUrgent = $this->option('urgente');

        $assinante = Assinante::where('email' , '=', $email)->get()->first();

        if ($assinante === null) {
            $this->error('Usuário não encontrado. Nenhum e-mail não enviado.');
            return;
        }

        $this->mailerService->enviarEmailManutencao($assinante, $isUrgent);
        $this->info("O e-mail foi enviado com sucesso para '$email'.");
    }
}
