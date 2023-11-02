<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Homework Show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col  gap-4 p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-bold">
                        {{__('Course')}} : <a class="font-normal" href="{{ route('course.show', ['course' => $homework->session->course]) }}">{{ $homework->session->course->name }}</a>
                    </h2>

                    <h2 class="text-xl font-bold">
                        {{__('Session')}} : <a href="{{ route('session.show', ['session' => $homework->session])}}" class="font-normal">{{$homework->session->name}}</a>
                    </h2>

                    <h2 class="text-xl font-bold">
                        {{__('Homework')}} : <span class="font-normal">{{$homework->title}}</span>
                    </h2>

                    <h2 class="text-xl font-bold">
                        {{__('deadline')}} : <span class="font-normal">{{$homework->deadline}}</span>
                    </h2>

                    <div class="text-lg show">
                        {!! $homework->body !!}
                    </div>

                    @can('veiwAny', [App\Models\Submission::class, $homework])
                        <x-button class="self-start" :href="route('homework.submission.index', ['homework' => $homework])" type="info"><i class="fa-thin fa-list"></i></x-button>
                    @endcan

                    @if ($homework->hasTimeLeft())
                        @if(auth()->user()->can('create', [App\Models\Submission::class, $homework]) && !$submission)
                            <x-button class="self-start" :href="route('homework.submission.create', ['homework' => $homework])" type="create"><i class="fa-thin fa-upload"></i></x-button>
                        @elseif (auth()->user()->can('update', $submission) && $submission)
                            {{-- <x-button class="self-start" :href="route('submission.edit', ['submission' => $submission])" type="edit"><i class="fa-thin fa-edit"></i></x-button> --}}
                        @endcan
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
