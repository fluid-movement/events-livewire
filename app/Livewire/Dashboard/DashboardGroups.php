<?php

namespace App\Livewire\Dashboard;

use App\Models\Group;
use App\Models\User;
use Livewire\Component;

class DashboardGroups extends Component
{
    public User $user;
    public $groups;
    public $allGroups;
    public $joinGroupSelect;

    public function mount()
    {
        $this->user = auth()->user();
        $this->groups = $this->user->groups ?? [];
        $this->allGroups = Group::all();
    }
    public function render()
    {
        return view('livewire.dashboard.dashboard-groups');
    }
    public function leaveGroup($id): void
    {
        $this->user->groups()->detach($id);
        $this->user->refresh();
        $this->groups = $this->user->groups ?? [];
    }

    public function joinGroup(): void
    {
        $group = Group::find($this->joinGroupSelect);
        $this->user->groups()->attach($group);
        $this->user->refresh();
        $this->groups = $this->user->groups ?? [];
    }
}
