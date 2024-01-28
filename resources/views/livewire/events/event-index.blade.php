<div>
    <ul>
        @foreach($events as $event)
            <li wire:key="{{$event->id}}">
                <a href="{{ route('events.view', ['event' => $event]) }}" wire:navigate >{{ $event->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
