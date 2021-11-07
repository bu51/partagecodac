<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit {{ $user->name }}
        </h2>
    </x-slot>
    @foreach ($errors->all() as $error)
    <span class="block text-red-500">{{$error}}</span>
    @endforeach



<!-- component -->
<div class="overflow-x-hidden bg-gray-100">

    <div class="px-6 py-8">
        <div class="max-w-7xl mx-auto lg:px-8">
            <form action="{{ route('admin.user.update',$user) }}" method="post">
                @method('put')
                @csrf
                <x-label for="name" value="Username"/>
                <x-input id="name" name="name" value="{{ $user->name }}"/>
                <x-label for="email" value="Email"/>
                <x-input id="email" name="email" value="{{ $user->email }}"/>
                <x-label for="is_admin" value="Admin ?"/>
                <input type="checkbox" name="is_admin" id="is_admin" value=1 {{$user->is_admin == 1 ? 'checked' : ''}}>
                <x-button style="display: block !important;" class="mt-5">Edit user</x-button>
            </form>
        </div>
    </div>
</div>
</x-app-layout>