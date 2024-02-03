<div>
    <x-subheading>
        <x-subheading-title>
            {{ __('Meet the jamily') }}
        </x-subheading-title>
    </x-subheading>
    <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @foreach($groups as $group)
            <a href="{{ route('groups.view', ['group' => $group]) }}" wire:navigate >
                <x-card wire:key="{{$group->id}}">
                    <h2 class="mb-4 text-4xl font-extrabold leading-none tracking-tight">{{ $group->name }}</h2>
                    <hr class="h-0.5 mx-auto my-2 bg-gradient-to-r from-indigo-500 via-orange-200 to-pink-300 border-0 rounded md:my-10">
                    <x-location :city="$group->city" :country="$group->country"/>
                </x-card>
            </a>
        @endforeach
    </div>
</div>
