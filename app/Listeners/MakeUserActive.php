<?php

namespace App\Listeners;

use App\Enums\UserStatus;
use App\Events\CenterBoughtPackage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MakeUserActive
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CenterBoughtPackage  $event
     * @return void
     */
    public function handle(CenterBoughtPackage $event)
    {
        if (!$event->center->status->is(UserStatus::Active())){
            $event->center->update([
                'status' => UserStatus::Active,
            ]);
        }
    }
}
