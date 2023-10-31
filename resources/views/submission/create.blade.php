<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Submission Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col gap-4">
                        <h2 class="text-xl font-bold">
                            {{__('Cource name')}} : <a class="font-normal" href="{{ route('course.show', ['course' => $homework->session->course]) }}">{{ $homework->session->course->name }}</a>
                        </h2>

                        <h2 class="text-xl font-bold">
                            {{__('Session name')}} : <a href="{{ route('session.show', ['session' => $homework->session])}}" class="font-normal">{{$homework->session->name}}</a>
                        </h2>

                        <h2 class="text-xl font-bold">
                            {{__('Homework title')}} : <span class="font-normal">{{$homework->title}}</span>
                        </h2>

                        <h2 class="text-xl font-bold">
                            {{__('Homework deadline')}} : <span class="font-normal">{{$homework->deadline}}</span>
                        </h2>
                    </div>
                    <form action="{{route('homework.submission.store',['homework' => $homework])}}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4 mt-8">
                        @csrf
                        <label for="anwer" class="text-xl font-semibold">anwer:</label>
                        <textarea name="anwer" id="anwer" class="dark:bg-gray-900">{{old('anwer')}}</textarea>
                        @error('anwer')
                            <span>{{$message}}</span>
                        @enderror

                        <label for="files" class="text-xl font-semibold">files:</label>
                        <input type="file" name="files[]" multiple >
                        @error('files')
                            <span>{{$message}}</span>
                        @enderror
                        @error('files.*')
                            <span>{{$message}}</span>
                        @enderror

                        <button type="submit" class="self-end mx-2 px-3 py-2 bg-green-500 hover:bg-green-400 dark:bg-green-800 dark:hover:bg-green-700 rounded-xl">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
