<?php

namespace App\Livewire\Dashboard;

use App\Models\Group;
use App\Models\User;
use Livewire\Component;

class DashboardEvents extends Component
{
    public User $user;
    public $events;

    public function mount()
    {
        $this->user = auth()->user();
        $this->events = $this->user->events ?? [];
    }
    public function render()
    {
        return view('livewire.dashboard.dashboard-events');
    }

}
