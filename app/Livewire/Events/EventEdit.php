<?php

namespace App\Livewire\Events;

use App\Models\Event;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EventEdit extends Component
{
    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('required|string')]
    public $description;

    #[Validate('required|string')]
    public $city;

    #[Validate('required|string')]
    public $country;

    #[Validate('required|date|before_or_equal:end')]
    public $start;

    #[Validate('required|date|after_or_equal:end')]
    public $end;

    public $id;
    public $routeKey;

    public function mount(Event $event)
    {
        $this->id = $event->id;
        $routeKeyName = $event->getRouteKeyName();
        $this->routeKey = $event->$routeKeyName; // slug

        $this->fill($event->only('name', 'description', 'city', 'country'));
        // format dates so the calendar display works
        $this->start = Carbon::create($event->start)->format('Y-m-d');
        $this->end = Carbon::create($event->end)->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.events.event-edit');
    }

    public function update(string $id)
    {
        $event = Event::findorFail($id);
        $event->update($this->validate());
        redirect()->route('events.view', ['event' => $event]);
    }
}
