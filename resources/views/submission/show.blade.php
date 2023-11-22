<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Session Show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col  gap-4 p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-bold">
                        {{__('Teacher')}} : <span class="font-normal">{{ $submission->homework->session->course->teacher->user->name }}</span>
                    </h2>

                    <h2 class="text-xl font-bold">
                        {{__('Course')}} : <a class="font-normal" href="{{ route('course.show', ['course' => $submission->homework->session->course]) }}">{{ $submission->homework->session->course->name }}</a>
                    </h2>

                    <h2 class="text-xl font-bold">
                        {{__('Session')}} : <a href="{{ route('session.show', ['session' => $submission->homework->session])}}" class="font-normal">{{$submission->homework->session->name}}</a>
                    </h2>

                    <h2 class="text-xl font-bold">
                        {{__('Homework')}} : <a href="{{ route('homework.show', ['homework' => $submission->homework])}}" class="font-normal">{{$submission->homework->title}}</a>
                    </h2>

                    <h2 class="text-xl font-bold">
                        {{__('deadline')}} : <span class="font-normal">{{$submission->homework->deadline}}</span>
                    </h2>

                    <div class="text-lg show">
                        {!! $submission->homework->body !!}
                    </div>

                    <div class="text-lg show">
                        {!! $submission->answer !!}
                    </div>

                    <div class="flex flex-col gap-4">
                        @forelse ($submission->files as $file )
                            <div class="flex justify-between">
                                <div class="text-lg">{{ $file->name }}</div>
                                <div class="flex gap-4">
                                    <a class="p-2 bg-green-800 rounded-lg" href="{{ route('file.download', ['file' => $file]) }}">
                                        <i class="fa-thin fa-download"></i>
                                    </a>
                                </div>
                            </div>
                        @empty

                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
