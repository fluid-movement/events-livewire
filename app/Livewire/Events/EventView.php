<?php

namespace App\Livewire\Events;

use App\Models\Event;
use Livewire\Component;

class EventView extends Component
{
    public Event $event;
    public $user;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function render()
    {
        return view('livewire.events.event-view');
    }

    public function decline()
    {
        $this->event->users()->detach(auth()->user());
        $this->event->refresh();
    }

    public function maybe()
    {
        $this->event->users()->detach(auth()->user());
        $this->event->users()->attach(auth()->user(), ['status' => Event::$interested]);
        $this->event->refresh();
    }

    public function attend()
    {
        $this->event->users()->detach(auth()->user());
        $this->event->users()->attach(auth()->user(), ['status' => Event::$attending]);
        $this->event->refresh();
    }

    public function delete($id): void
    {
        $event = Event::where('id', $id)->first();
        $event->delete();
        session()->flash('message', 'Event Deleted.');
        redirect()->route('events.index');
    }
}
