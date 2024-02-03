<div>
    <x-dashboard-header />
    <div class="grid grid-cols-1 gap-2 md:grid-cols-2">
        @forelse($events as $event)
            @php
                $class = 'bg-orange-200';
                if($user->attending($event)) {
                    $class = 'bg-green-200';
                }
            @endphp
            <x-card wire:key="{{$event->id}}" title="{{ $event->name }}" header-classes="{{$class}}" rounded="sm" color="border-black">
                <ul class="mb-4 text-gray-400">
                    <x-event-date :event="$event" :format="'d. F Y'"/>
                    <li class="flex gap-2 items-center">
                        <x-icon name="location-marker" class="w-4 h-4"/>
                        {{ $event->city }}, {{ $event->country }}
                    </li>
                    <li class="flex gap-2 items-center">
                        <x-icon name="user-group" class="w-4 h-4"/>
                        <a class="hover:bg-gray-100" href="{{ route('groups.view', ['group' => $event->group]) }}" wire:navigate>{{ $event->group->name }} </a>
                    </li>
                </ul>
                <x-slot name="footer">
                    <div class="flex justify-between items-center">
                        <x-button
                            href="{{ route('events.view', ['event' => $event]) }}"
                            icon="information-circle" wire:navigate
                            label="{{ __('View') }}"
                        />
                    </div>
                </x-slot>
            </x-card>

        @empty
            <p>
                {{ __('You are not attending any events.') }}
            </p>
        @endforelse
    </div>
</div>
