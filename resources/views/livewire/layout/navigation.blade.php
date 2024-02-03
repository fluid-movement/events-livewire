<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav class="bg-white border-b border-gray-300">
    <!-- Primary Navigation Menu -->
    <div class="max-w-6xl mx-auto px-4 h-20">
        <div class="pt-4 flex gap-4 justify-center">
            <!-- Navigation Links -->
            <div class="flex">
                <x-nav-link
                    :href="route('dashboard.events')"
                    :active="request()->is('dashboard*')"
                    wire:navigate>
                    <div class="flex gap-2">
                        <x-icon name="home" solid class="w-10 h-10"/>
                    </div>
                </x-nav-link>
            </div>
            <div class="flex">
                <x-nav-link :href="route('events.index')" :active="request()->is('events*')" wire:navigate>
                    <div class="flex gap-2">
                        <x-icon name="calendar" solid class="w-10 h-10"/>
                    </div>
                </x-nav-link>
            </div>
            <div class="flex">
                <x-nav-link :href="route('groups.index')" :active="request()->is('groups*')" wire:navigate>
                    <div class="flex gap-2">
                        <x-icon name="user-group" solid class="w-10 h-10"/>
                    </div>
                </x-nav-link>
            </div>
        </div>
    </div>
</nav>
