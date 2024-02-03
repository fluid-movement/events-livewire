<div>
    <div class="mb-8 flex gap-2 items-center text-sm text-gray-400">
        <x-button href="{{ route('groups.index') }}" icon="arrow-left" wire:navigate>
            {{ __('Back to groups') }}
        </x-button>
    </div>
    <div>
        <div class="flex justify-between">
            <h1 class="text-xl font-semibold mb-4">
                {{ $group->name }}
            </h1>
        </div>
        <div class="mb-4 text-slate-400">
            <x-location :city="$group->city" :country="$group->country"/>
        </div>
        <div>
            {{ $group->description }}
        </div>
    </div>
    <h2 class="text-lg font-semibold my-4">
        {{ __('Events') }}
    </h2>
    <div class="grid grid-cols-1 gap-2 md:grid-cols-2">
        @forelse($group->events as $event)
            <x-card wire:key="{{$event->id}}" title="{{ $event->name }}" rounded="sm" color="border-black">
                <ul class="mb-4 text-gray-400">
                    <li class="flex gap-2 items-center">
                        <x-icon name="calendar" class="w-4 h-4"/>
                        {{ $event->start->format('d. F Y') }} - {{ $event->end->format('d. F Y') }}
                    </li>
                    <li class="flex gap-2 items-center">
                        <x-icon name="location-marker" class="w-4 h-4"/>
                        {{ $event->city }}, {{ $event->country }}
                    </li>
                </ul>
                <x-slot name="footer">
                    <div class="flex justify-between items-center">
                        <x-button
                            class="h-8"
                            href="{{ route('events.view', ['event' => $event]) }}"
                            primary icon="information-circle" wire:navigate
                            label="{{ __('View') }}"
                        />
                    </div>
                </x-slot>
            </x-card>
        @empty
            <p>
                {{ __("We currently don't have any events planned.") }}
            </p>
        @endforelse
    </div>
</div>
