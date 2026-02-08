<?php

namespace App\Providers;

use App\Events\CenterBoughtPackage;
use App\Listeners\GiveGenerationCommission;
use App\Listeners\GiveSponsorCommission;
use App\Listeners\IncreaseCashback;
use App\Listeners\IncreaseUpperCarry;
use App\Listeners\MakeUserActive;
use App\Listeners\SendToCashback;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CenterBoughtPackage::class => [
            MakeUserActive::class,
            IncreaseUpperCarry::class,
            // GiveSponsorCommission::class,
            GiveGenerationCommission::class,
            // SendToCashback::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
