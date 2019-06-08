<?php

namespace App\Listeners;

use App\Events\ProjectUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProjectUpdatedListener
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
     * @param  ProjectUpdated  $event
     * @return void
     */
    public function handle(ProjectUpdated $event)
    {
        //
        dump('project updated - tied in by Project updated event hook ', $event->project);
    }
}
