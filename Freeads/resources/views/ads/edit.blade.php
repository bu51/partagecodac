<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit {{ $ad->title }}
        </h2>
    </x-slot>
    @foreach ($errors->all() as $error)
    <span class="block text-red-500">{{$error}}</span>
    @endforeach



<!-- component -->
<div class="overflow-x-hidden bg-gray-100">

    <div class="px-6 py-8">
        <div class="max-w-7xl mx-auto lg:px-8">
            <form action="{{ route('ads.update',$ad) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <x-label for="title" value="Title of the Ad"/>
                <x-input id="title" name="title" value="{{ $ad->title }}"/>
                <x-label for="content" value="Content of The Ad"/>
                <textarea id="content" name="content">{{ $ad->content }}</textarea>
                <x-label for="image" value="Image of the Ad"/>
                <x-input id="image" name="image" type="file"/>
                <x-label for="category" value="Category of the Ad"/>
                <select name="category" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $ad->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-button style="display: block !important;" class="mt-5">Edit the Ad</x-button>
            </form>
        </div>
    </div>
</div>
</x-app-layout>