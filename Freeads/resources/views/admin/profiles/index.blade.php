<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as Admin!
                </div>
            </div>
        </div>
    </div>
    @if(session('succes'))
    {{ session('succes')  }}
    @endif
    <div class="px-6 py-8">
        <div class="container flex justify-between mx-auto">
            <div class="w-full lg:w-8/12">
                @foreach ($users as $user)
                <div class="mt-6">
                    <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                        <div><a href="#" class="flex items-center"><img
                            src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                            alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                            <h1 class="font-bold text-gray-700 hover:underline">{{ $user->name }}</h1>
                        </a></div>
                        <a href="{{ route('admin.user.edit',$user) }}" class="px-2 py-1 font-bold text-white-100 bg-yellow-600 rounded hover:bg-yellow-500">Edit</a>
                        <a href="#" class="px-2 py-1 font-bold text-gray-100 bg-red-600 rounded hover:bg-red-500"
                         onclick="event.preventDefault;document.getElementById('destroy{{$user->id}}').submit();">Delete
                            <form id="destroy{{$user->id}}" style="display:none;" method="post" action="{{ route('admin.user.destroy',$user) }}">
                                @csrf
                                @method('delete')
                            </form>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>