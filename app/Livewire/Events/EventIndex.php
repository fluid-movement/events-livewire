<?php

namespace App\Livewire\Events;

use App\Models\Event;
use App\Models\Group;
use Livewire\Component;

class EventIndex extends Component
{
    public $sortedEvents;

    public function mount()
    {
        $this->sortedEvents = $this->getSortedEvents();
    }

    public function render()
    {
        return view('livewire.events.event-index');
    }

    protected function getSortedEvents()
    {
        $events = [];
        foreach (Event::with('group')->get() as $event) {
            $events[$event->start->format('Y')][$event->start->format('F')][] = $event;
        }
        return $events;
    }
}
