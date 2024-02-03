<div>
    <x-subheading>
        <x-subheading-title>
            {{ $event->name }}
        </x-subheading-title>
    </x-subheading>
    <div class="mb-8 flex gap-2 items-center text-sm text-gray-400">
        <x-button href="{{ route('events.index') }}" icon="arrow-left" wire:navigate>
            {{ __('All Events') }}
        </x-button>
    </div>
    <x-card>
        <div class="flex justify-between">
            <div class="flex gap-4 items-center mb-4">
                @auth
                    @if(auth()->user()->notAttending($event))
                        <x-button icon="thumb-down" label="Not attending" black/>
                    @else
                        <x-button icon="thumb-down" wire:click="decline" label="Not attending"/>
                    @endif

                    @if(auth()->user()->interested($event))
                        <x-button label="Interested" orange/>
                    @else
                        <x-button wire:click="maybe" label="Interested"/>
                    @endif

                    @if(auth()->user()->attending($event))
                        <x-button icon="thumb-up" label="Attending" green/>
                    @else
                        <x-button icon="thumb-up" wire:click="attend" label="Attending"/>
                    @endif
                @elseauth
                    <x-button icon="thumb-down" label="Not attending" black/>
                    <div>
                        {{ __('Please login to attend this event.')}}
                    </div>
                @endauth
            </div>
            <div>
                <div>
                    Interested: {{ $event->interested->count() }}
                </div>
                <div>
                    Attending: {{ $event->attending->count() }}
                </div>
            </div>
        </div>

        <div>
            <ul class="mb-4 text-gray-400">
                <x-event-date :event="$event"/>
                <li class="flex gap-2 items-center">
                    <x-icon name="location-marker" class="w-4 h-4"/>
                    {{ $event->city }}, {{ $event->country }}
                </li>
                <li class="flex gap-2 items-center">
                    <x-icon name="user-group" class="w-4 h-4"/>
                    {{ $event->group->name }}
                </li>
            </ul>
        </div>
        <p class="text-sm text-gray-500">
            {{ $event->description }}
        </p>
    </x-card>
</div>
