<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('HomeWork Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('homework.update',['homework' => $homework])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="title">title:</label>
                        <input type="text" name="title" id="title" value="{{$homework->title}}">
                        @error('title')
                            <span>{{$message}}</span>
                        @enderror

                        <label for="body">body:</label>
                        <textarea name="body" id="body">{{$homework->body}}</textarea>
                        @error('body')
                            <span>{{$message}}</span>
                        @enderror

                        <button type="submit">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
