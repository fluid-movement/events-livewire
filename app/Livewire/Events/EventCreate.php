<?php

namespace App\Livewire\Events;

use App\Models\Event;
use App\Models\Group;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EventCreate extends Component
{
    #[Validate('required|string|max:255')]
    public $eventName;
    #[Validate('required|string')]
    public $eventDescription;
    #[Validate('required|string')]
    public $eventCity;
    #[Validate('required|string')]
    public $eventCountry;
    #[Validate('required|date')]
    public $eventStart;
    #[Validate('required|date')]
    public $eventEnd;

    #[Validate('required|string')]
    public $eventGroup;
    public $groups;

    public function mount(?string $id = '')
    {
        $this->eventGroup = $id;
        $this->groups = auth()->user()->groups;
    }

    public function render()
    {
        return view('livewire.events.event-create');
    }

    public function submit()
    {
        $this->validate();

        $event = Event::create([
            'name' => $this->eventName,
            'slug' => \Str::slug($this->eventName),
            'description' => $this->eventDescription,
            'start' => $this->eventStart,
            'end' => $this->eventEnd,
            'city' => $this->eventCity,
            'country' => $this->eventCountry,
            'group_id' => $this->eventGroup, // todo validate this
        ]);

        redirect()->route('events.view', ['event' => $event]);
    }
}
