<div>
    <div>
        <x-button class="mb-4" href="{{ route('dashboard.groups') }}" icon="arrow-left" label="Dashboard" />
        <form wire:submit="submit" class="space-y-4">
            <x-input wire:model.blur="name" label="Name" placeholder="What name is your crew known by?"/>
            <x-textarea wire:model.blur="description" label="Description" placeholder="Write something about your crew"/>
            <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                <x-input wire:model.blur="city" label="City" placeholder=""/>
                <x-input wire:model.blur="country" label="Country" placeholder=""/>
            </div>
            <div class="pt-4">
                <x-button type="submit" green spinner>Create Group</x-button>
            </div>
        </form>
    </div>
</div>
