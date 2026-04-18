<?php

namespace App\Listeners;

use App\Events\CandidatureDeposee;
use Illuminate\Support\Facades\Storage;

class LogCandidatureDeposee
{
    public function handle(CandidatureDeposee $event): void
    {
        $candidature = $event->candidature->load('profil.user', 'offre');

        $nomCandidat = $candidature->profil->user->name ?? 'Inconnu';
        $titreOffre  = $candidature->offre->titre ?? 'Inconnu';
        $date        = now()->format('Y-m-d H:i:s');

        $ligne = "[{$date}] Candidature déposée — Candidat: {$nomCandidat} | Offre: {$titreOffre}" . PHP_EOL;

        file_put_contents(
            storage_path('logs/candidatures.log'),
            $ligne,
            FILE_APPEND
        );
    }
}