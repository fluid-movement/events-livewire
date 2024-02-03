<div>
    <div>
        <x-button class="mb-4" href="{{ route('dashboard.groups') }}" icon="arrow-left" label="Back" />
        <form wire:submit="update('{{$id}}')" class="space-y-4">
            <x-input wire:model.blur="name" label="Event Name" placeholder="Jam at the beach all weekend!"/>
            <x-textarea wire:model.blur="description" label="Description" placeholder="What is your event all about?"/>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
                <x-input wire:model.blur="city" label="City" placeholder=""/>
                <x-input wire:model.blur="country" label="Country" placeholder=""/>
                <x-input wire:model.blur="start" type="date" label="Event start"/>
                <x-input wire:model.blur="end" type="date" label="Event end"/>
            </div>
            <div class="pt-4">
                <x-button type="submit" green spinner>Save changes</x-button>
            </div>
        </form>
    </div>
</div>
