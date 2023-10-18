<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Session Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="flex flex-col gap-4" action="{{route('session.update', ['session' => $session])}}" method="POST">
                        @csrf
                        @method('patch')
                        <label class="text-xl font-bold" for="name">name:</label>
                        <input class="dark:bg-black dark:text-white" type="text" name="name" id="name" value="{{$session->name}}">
                        @error('name')
                            <span>{{$message}}</span>
                        @enderror
                        <button class="self-end mx-2 px-3 py-2 bg-green-500 hover:bg-green-400 dark:bg-green-800 dark:hover:bg-green-700 rounded-xl" type="submit">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
