<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $ad->title }}
        </h2>
    </x-slot>



<!-- component -->
<div class="overflow-x-hidden bg-gray-100 flex items-center">
    <img src="{{ asset('/storage/'.$ad->image) }}"/>
    <div>
        {{$ad->content}}
    </div>

    
</div>
</x-app-layout>