<?php

namespace App\Livewire\Groups;

use App\Models\Group;
use Auth;
use Livewire\Component;

class GroupEdit extends Component
{
    public $group;
    public $groupName;
    public $groupSlug;
    public $groupDescription;
    public $groupCity;
    public $groupCountry;

    public function mount(Group $group)
    {
        if ($group->exists) {
            $this->groupName = $group->name;
            $this->groupSlug = $group->slug;
            $this->groupDescription = $group->description;
            $this->groupCity = $group->city;
            $this->groupCountry = $group->country;
            $this->group = $group;
        } else {
            $this->group = new Group();
        }
    }

    public function render()
    {
        return view('livewire.groups.group-edit');
    }

    public function submit()
    {
        $this->validate([
            'groupName' => ['required', 'string'],
            'groupDescription' => ['required', 'string'],
            'groupCity' => ['required', 'string'],
            'groupCountry' => ['required', 'string'],
        ]);

        if ($this->group->exists()) {
            $this->group->update([
                'name' => $this->groupName,
                'slug' => $this->groupSlug,
                'description' => $this->groupDescription,
                'city' => $this->groupCity,
                'country' => $this->groupCountry,
            ]);
        } else {
            $this->group = Group::create([
                'name' => $this->groupName,
                'slug' => \Str::slug($this->groupName),
                'description' => $this->groupDescription,
                'city' => $this->groupCity,
                'country' => $this->groupCountry,
            ]);

            $this->group->save();
            Auth::user()->groups()->attach($this->group);
        }

        redirect()->route('groups.view', ['group' => $this->group]);
    }
}
