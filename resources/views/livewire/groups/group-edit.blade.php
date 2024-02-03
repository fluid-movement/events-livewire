<div>
    <div>
        <x-button class="mb-4" href="{{ route('dashboard.groups') }}" icon="arrow-left" label="Dashboard" />
        <form wire:submit="submit" class="space-y-4">
            <x-input wire:model="groupName" label="Name" placeholder="What name is your crew known as?"/>
            <x-textarea wire:model="groupDescription" label="Description" placeholder="Write something about your crew"/>
            <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                <x-input wire:model="groupCity" label="City" placeholder=""/>
                <x-input wire:model="groupCountry" label="Country" placeholder=""/>
            </div>
            <div class="pt-4">
                <x-button type="submit" primary right-icon="calendar" spinner>Submit</x-button>
            </div>
            <x-errors/>
        </form>
    </div>
</div>
