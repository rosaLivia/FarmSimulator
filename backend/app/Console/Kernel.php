<?php

/*
Descrição:
Arquivo responsável por criar comandos personalizáveis executáveis via prompt e agendar a excecução
automática deles.

Exemplos:
Em tal hora, diáriamente, limpe todos os tokens criados.
*/

namespace App\Console; #Define o escopo de atuação das variáveis do código.

#Import de classes para serem usadas ao longo do código.
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

#Criação de classe
class Kernel extends ConsoleKernel #Cria a classe Kernel herdando as propriedades do ConsoleKernel
{
  #Cria uma função que agenda a limpeza de tokens para 15:10 diariamente
  protected function schedule(Schedule $schedule): void #Schedule -> Agende isso para esse horário
  {
    $schedule->command('sanctum:prune-expired --hours=24')->dailyAt('15:10');
    // $schedule->command('inspire')->hourly();
  }

  #Cria uma função que importa comandos personalizados para que possam ser usados no terminal
  protected function commands(): void
  {
    $this->load(__DIR__ . '/Commands');

    require base_path('routes/console.php');
  }
}