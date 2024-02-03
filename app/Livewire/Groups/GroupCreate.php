<?php

namespace App\Livewire\Groups;

use App\Models\Group;
use Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class GroupCreate extends Component
{
    #[Validate('required|string')]
    public $name;

    #[Validate('required|string')]
    public $description;

    #[Validate('required|string')]
    public $city;

    #[Validate('required|string')]
    public $country;

    public function render()
    {
        return view('livewire.groups.group-create');
    }

    public function submit()
    {
        $group = Group::create(array_merge($this->validate(), ['slug' => \Str::slug($this->name)]));
        Auth::user()->groups()->attach($group);
        redirect()->route('groups.view', ['group' => $group]);
    }
}
