<?php

namespace App\Events;

use App\Http\Requests\SectionRequest;
use App\Section;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SectionCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $section;
    public $request;

    /**
     * Create a new event instance.
     *
     * @param Section $section
     * @param SectionRequest $request
     */
    public function __construct(Section $section, SectionRequest $request)
    {
        $this->section = $section;
        $this->request = $request;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
