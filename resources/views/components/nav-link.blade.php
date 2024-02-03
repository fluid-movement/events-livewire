<a href="{{ $href }}"
   class="flex items-center mx-1 px-4 py-2 text-sm rounded-lg
    text-gray-700
    hover:bg-gray-200
    {{ $active ? 'ring-2 bg-gray-200' : '' }}"
   wire:navigate
>
    {{ $slot }}
</a>
