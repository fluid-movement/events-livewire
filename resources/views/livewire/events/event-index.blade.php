<div>
    <ul>
        @foreach($sortedEvents as $year => $months)
            <x-subheading>
                <x-subheading-title>{{ __('Events in :year', ['year' => $year])}}</x-subheading-title>
            </x-subheading>
            <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                @foreach($months as $month => $events)
                    <x-card title="{{ $month }}" header-classes="bg-blue-300">
                        <ul>
                            @foreach($events as $event)
                                <li wire:key="{{$event->id}}">
                                    <span class="text-slate-400">{{$event->start->format('jS')}}</span>
                                    <a class="text-lg font-bold"
                                       href="{{ route('events.view', ['event' => $event]) }}"
                                       wire:navigate>
                                        {{ $event->name }}
                                    </a>
                                    <x-location :city="$event->city" :country="$event->country"/>
                                    <x-event-group :group="$event->group"/>

                                </li>
                                @if(!$loop->last)
                                    <hr class="w-48 h-1 mx-auto bg-gray-100 border-0 rounded md:my-2 dark:bg-gray-700">
                                @endif
                            @endforeach
                        </ul>
                    </x-card>
                @endforeach
            </div>
        @endforeach
    </ul>
</div>
