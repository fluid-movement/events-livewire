<?php

namespace App\Livewire\Events;

use App\Models\Event;
use Livewire\Component;

class EventIndex extends Component
{
    public function render()
    {
        $events = Event::all()->sortBy('start', SORT_DESC);
        return view('livewire.events.event-index', ['events' => $events]);
    }
}
