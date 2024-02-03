<?php

namespace App\Livewire\Groups;

use App\Models\Group;
use Livewire\Component;

class GroupIndex extends Component
{
    public $groups;

    public function mount()
    {
        $this->groups = Group::all();
    }
    public function render()
    {
        return view('livewire.groups.group-index');
    }
}
