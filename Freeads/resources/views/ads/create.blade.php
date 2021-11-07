<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create an Ad') }}
        </h2>
    </x-slot>
    @foreach ($errors->all() as $error)
    <span class="block text-red-500">{{$error}}</span>
    @endforeach



<!-- component -->
<div class="overflow-x-hidden bg-gray-100">

    <div class="px-6 py-8">
        <div class="max-w-7xl mx-auto lg:px-8">
            <form action="{{ route('ads.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-label for="title" value="Title of the Ad"/>
                <x-input id="title" name="title"/>
                <x-label for="content" value="Content of The Ad"/>
                <textarea id="content" name="content"></textarea>
                <x-label for="image" value="Image of the Ad"/>
                <x-input id="image" name="image" type="file"/>
                <x-label for="category" value="Category of the Ad"/>
                <select name="category" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-button style="display: block !important;" class="mt-5">Create the Ad</x-button>
            </form>
        </div>
    </div>
</div>
</x-app-layout>