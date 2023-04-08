<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Topic Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('session.topic.store',['session' => $session])}}" method="POST">
                        @csrf
                        <label for="name">name:</label>
                        <input type="text" name="name" id="name" value="{{old('name')}}">
                        @error('name')
                            <span>{{$message}}</span>
                        @enderror
                        <button type="submit">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
