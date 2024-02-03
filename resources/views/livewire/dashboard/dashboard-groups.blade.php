<div>
    <x-dashboard-header/>
    <h2 class="text-lg font-semibold my-4">
        {{ __('My Groups') }}
    </h2>
    @forelse($groups as $group)
        <div class="mb-8">
            <x-card wire:key="{{$group->id}}" title="{{ $group->name }}" class="mb-2">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    @foreach($group->events as $event)
                        <x-card rounded="" shadow="" title="{{$event->name}}" class="mb-4">
                            <x-event-date :event="$event" :format="'d. F Y'"/>
                            <div class="flex gap-2 pt-4">
                                <x-button href="{{ route('events.view', ['event' => $event]) }}" icon="information-circle"
                                          wire:navigate label="{{ __('View') }}"/>
                                <x-button href="{{ route('events.edit', ['event' => $event]) }}" icon="pencil" wire:navigate
                                          label="{{ __('Edit') }}"/>
                            </div>
                        </x-card>
                    @endforeach
                </div>
                <x-slot name="footer">
                    <div class="flex justify-between items-center">
                        <div class="grid gap-4 grid-cols-1 md:grid-cols-2">
                            <x-button
                                href="{{ route('groups.view', $group) }}"
                                icon="information-circle"
                                primary wire:navigate
                                label="{{ __('View group page') }}"
                            />
                            <div>
                                <x-button
                                    href="{{ route('events.create', ['id' => $group->id]) }}"
                                    primary icon="plus" wire:navigate
                                    label="{{ __('Create new Event') }}"/>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <x-button
                                wire:click="leaveGroup('{{$group->id}}')"
                                icon="arrow-right"
                                label="{{ __('Leave group') }}"
                            />
                            <div class="flex gap-1">
                                <x-button.circle
                                    href="{{ route('groups.edit', ['group' => $group]) }}"
                                    icon="pencil" wire:navigate
                                />
                                <x-button.circle icon="trash" wire:click="delete('{{$group->id}}')"></x-button.circle>
                            </div>
                        </div>
                    </div>
                </x-slot>
            </x-card>
        </div>
    @empty
        <p>
            {{ __('You are not a member of any group yet.') }}
        </p>
    @endforelse
    <div class="mt-10 grid gap-4 grid-cols-2 md:grid-cols-4 items-center">
        <h2 class="text-lg">
            {{ __('Create a new group') }}
        </h2>
        <x-button
            class="h-8"
            href="{{ route('groups.create') }}"
            primary icon="plus" wire:navigate
            label="{{ __('Create Group') }}"
        />
        <x-native-select
            option-value="id"
            option-label="name"
            wire:model="joinGroupSelect"
            :options="$allGroups"
            placeholder="Select a group"
        />
        <x-button
            class="h-8"
            wire:click="joinGroup"
            primary icon="plus"
            label="{{ __('Join Group') }}"
        />
    </div>
</div>

