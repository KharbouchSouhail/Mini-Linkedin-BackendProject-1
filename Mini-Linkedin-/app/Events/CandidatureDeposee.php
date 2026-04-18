<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Candidature;

class CandidatureDeposee
{
    use Dispatchable, SerializesModels;

    public Candidature $candidature;

    public function __construct(Candidature $candidature)
    {
        $this->candidature = $candidature;
    }
}
