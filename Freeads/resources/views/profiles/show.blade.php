<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}
        </h2>
    </x-slot>



<!-- component -->
<div class="overflow-x-hidden bg-gray-100">

    <div class="px-6 py-8">
        <div class="container flex justify-between mx-auto">
            <div class="w-full lg:w-8/12">
                @foreach ($ads as $ad)
                <div class="mt-6">
                    <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                            <div class="flex items-center justify-between"><span class="font-light text-gray-600">{{ $ad->created_at->format('d M Y') }}</span><a href="/?category={{ $ad->category->name }}"
                                    class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">{{ $ad->category->name }}</a>
                            </div>
                            <div class="mt-2"><a href="{{ route('ads.show',$ad) }}" class="text-2xl font-bold text-gray-700 hover:underline">{{ $ad->title }}</a>
                                <p class="mt-2 text-gray-600">{{ Str::limit($ad->content,75) }}</p>
                            </div>
                            <div class="flex items-center justify-between mt-4"><a href="{{ route('ads.show',$ad) }}"
                                    class="text-blue-500 hover:underline">Read more</a>
                                <div><a href="#" class="flex items-center"><img
                                            src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                            alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                        <h1 class="font-bold text-gray-700 hover:underline">{{ $ad->user->name }}</h1>
                                    </a></div>
                            </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</x-app-layout>