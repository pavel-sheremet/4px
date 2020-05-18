<?php

namespace App\Listeners;

use App\Events\SectionCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetSectionUsers
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
     * @param  object  $event
     * @return void
     */
    public function handle(SectionCreated $event)
    {
        $event->section->users()->sync($event->request->get('user_id'));
    }
}
