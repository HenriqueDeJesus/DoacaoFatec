<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\Reserva;


class LimparReservas extends Command
{
    protected $signature = 'limpar:reservas';

    protected $description = 'Limpar reservas após dois dias';

    public function handle()
    {
        // Obter a data de dois dias atrás
        $dataLimite = Carbon::now()->subDays(2);

        // Buscar reservas com mais de dois dias
        $reservasExpiradas = Reserva::where('created_at', '<', $dataLimite)->get();

        foreach ($reservasExpiradas as $reserva) {
            // Excluir reserva
            $reserva->delete();

            // Atualizar o status do produto para "Disponível"
            $reserva->produto->update(['Status' => 'Disponivel']);
        }

        $this->info('Reservas expiradas foram limpas.');
    }
}
