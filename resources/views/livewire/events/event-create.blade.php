<div>
    @if($eventGroup)
        <x-subheading>
            <x-subheading-title>
                {{ __('Creating event for :name', ['name' => $groups->find($eventGroup)->name ]) }}
            </x-subheading-title>
        </x-subheading>
    @else
        <x-subheading>
            <div>
                {{ __('Creating event') }}
            </div>
        </x-subheading>
    @endif
    <x-button class="mb-4" href="{{ route('dashboard.groups') }}" icon="arrow-left" label="Back"/>
    <form wire:submit="submit" class="space-y-4">
        @csrf

        @if(!$eventGroup)
            <x-native-select
                option-value="id"
                option-label="name"
                wire:model="eventGroup"
                label="Which group is this event for?"
                :options="$groups"
                placeholder="Select a group"
            />
        @endif
        <x-input wire:model="eventName" label="Event Name" placeholder="Jam at the beach all weekend!"/>
        <x-textarea wire:model="eventDescription" label="Description" placeholder="What is your event all about?"/>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            <x-input wire:model="eventCity" label="City" placeholder=""/>
            <x-input wire:model="eventCountry" label="Country" placeholder=""/>
            <x-input wire:model="eventStart" type="date" label="Event start"/>
            <x-input wire:model="eventEnd" type="date" label="Event end"/>
        </div>
        <div class="pt-4">
            <x-button type="submit" primary right-icon="calendar" spinner>Submit</x-button>
        </div>
        <x-errors/>
    </form>
</div>
