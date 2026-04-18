<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\CandidatureDeposee;
use App\Events\StatutCandidatureMis;
use App\Listeners\LogCandidatureDeposee;
use App\Listeners\LogStatutCandidatureMis;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        CandidatureDeposee::class => [
            LogCandidatureDeposee::class,
        ],
        StatutCandidatureMis::class => [
            LogStatutCandidatureMis::class,
        ],
    ];
}
