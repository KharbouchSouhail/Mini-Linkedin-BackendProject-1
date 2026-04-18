<?php

namespace App\Listeners;

use App\Events\StatutCandidatureMis;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class LogStatutCandidatureMis
{
    public function handle(StatutCandidatureMis $event): void
    {
        $date          = now()->format('Y-m-d H:i:s');
        $ancienStatut  = $event->ancienStatut;
        $nouveauStatut = $event->nouveauStatut;

        $ligne = "[{$date}] Statut mis à jour — Ancien: {$ancienStatut} | Nouveau: {$nouveauStatut}" . PHP_EOL;

        file_put_contents(
            storage_path('logs/candidatures.log'),
            $ligne,
            FILE_APPEND
        );
    }
}