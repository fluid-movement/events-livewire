<p class="flex gap-2 items-center">
    <x-icon name="user-group" class="w-4 h-4"/>
    <a class="hover:bg-slate-100" href="{{route('groups.view', ['group' => $group])}}">{{ $group->name }}</a>
</p>
