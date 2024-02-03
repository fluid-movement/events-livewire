<li class="flex gap-2 items-center">
    @php($format = $format ?? 'l, d. F Y')
    <x-icon name="calendar" class="w-4 h-4"/>
    @if($event->isOneDay())
        {{ $event->start->format($format) }}
    @else
        {{ $event->start->format($format) }} - {{ $event->end->format($format) }}
    @endif
</li>
