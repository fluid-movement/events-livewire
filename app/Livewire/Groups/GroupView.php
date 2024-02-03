<?php

namespace App\Livewire\Groups;

use App\Models\Group;
use Livewire\Component;

class GroupView extends Component
{
    public Group $group;
    public $events;

    public function mount(Group $group)
    {
        $this->group = $group;
        $this->events = $group->events()->get();
    }

    public function render()
    {
        return view('livewire.groups.group-view')->title($this->group->name);
    }

    public function delete($id): void
    {
        $group = Group::where('id', $id)->first();
        $group->delete();
        session()->flash('message', 'Group Deleted Successfully.');
        redirect()->route('groups.index');
    }
}
