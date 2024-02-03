<?php

namespace App\Livewire\Dashboard;

use App\Providers\RouteServiceProvider;
use Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Session;
use Illuminate\Validation\Rule;
class DashboardProfile extends Component
{
    public string $name = '';
    public string $email = '';

    public function render()
    {
        return view('livewire.dashboard.dashboard-profile');
    }

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    #[On('profile-updated')]
    public function updatedProfile(): void
    {
        $this->mount();
    }
}
