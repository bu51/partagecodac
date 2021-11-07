<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Freeads') }}
        </h2>
    </x-slot>
    



<!-- component -->
<div class="overflow-x-hidden bg-gray-100">

    <div class="px-6 py-8">
        <div class="container flex justify-between mx-auto">
            <div class="w-full lg:w-8/12">
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Post</h1>
                    @include('partials.search')
                    <div>
                        <select class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option>Latest</option>
                            <option>Last Week</option>
                        </select>
                    </div>
                </div>
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
                                <div><a href="{{ route('user.show',$ad->user) }}" class="flex items-center"><img
                                            src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                            alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                        <h1 class="font-bold text-gray-700 hover:underline">{{ $ad->user->name }}</h1>
                                    </a></div>
                            </div>
                    </div>
                </div>
                @endforeach
                <div class="mt-8">
                        {{ $ads->withQueryString()->links() }}
                </div>
            </div>
            <div class="hidden w-4/12 -mx-8 lg:block">
                <div class="px-8">
                    <h1 class="mb-4 text-xl font-bold text-gray-700">Authors</h1>
                    <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
                        <ul class="-mx-4">
                            @foreach ($bestusers as $buser)
                            <li class="flex items-center"><img
                                    src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                    alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                <p><a href="{{ route('user.show',$buser->user) }}" class="mx-1 font-bold text-gray-700 hover:underline">{{ $buser->user->name }}</a><span
                                        class="text-sm font-light text-gray-700">Created {{ $buser->countads }} ads</span></p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="px-8 mt-10">
                    <h1 class="mb-4 text-xl font-bold text-gray-700">Categories</h1>
                    <div class="flex flex-col max-w-sm px-4 py-6 mx-auto bg-white rounded-lg shadow-md">
                        <ul>
                            @foreach ($categories as $category)
                            <li><a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline" onclick="event.preventDefault;document.getElementById('{{ 'cat'.$category->id }}').submit();">-
                                    {{ $category->name }}
                                    <form id="{{ 'cat'.$category->id }}" style="display:none;" method="GET" action="{{ route('ads.index') }}">
                                        <input name="category" value="{{ $category->name }}">
                                    </form>
                                </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="px-8 mt-10">
                    <h1 class="mb-4 text-xl font-bold text-gray-700">Recent Post</h1>
                    <div class="flex flex-col max-w-sm px-8 py-6 mx-auto bg-white rounded-lg shadow-md">
                        <div class="flex items-center justify-center"><a href="/?category={{ $last->category->name }}"
                                class="px-2 py-1 text-sm text-green-100 bg-gray-600 rounded hover:bg-gray-500">{{ $last->category->name }}</a>
                        </div>
                        <div class="mt-4"><a href="{{ route('ads.show',$last) }}" class="text-lg font-medium text-gray-700 hover:underline">{{ $last->title }}</a></div>
                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center"><img
                                    src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                    alt="avatar" class="object-cover w-8 h-8 rounded-full"><a href="{{ route('user.show',$last->user) }}"
                                    class="mx-3 text-sm text-gray-700 hover:underline">{{ $last->user->name }}</a></div><span
                                class="text-sm font-light text-gray-600">{{ $last->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
