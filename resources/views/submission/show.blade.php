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

                    <div class="text-lg">
                        {{ $homework->body }}
                    </div>

                    @can('veiwAny', [App\Models\Submission::class, $homework])
                        <x-button class="self-start" :href="route('homework.submission.index', ['homework' => $homework])" type="info"><i class="fa-thin fa-list"></i></x-button>
                    @endcan

                    @if(auth()->user()->can('create', [App\Models\Submission::class, $homework]) && $homework->hasTimeLeft())
                        <x-button class="self-start" :href="route('homework.submission.create', ['homework' => $homework])" type="create"><i class="fa-thin fa-upload"></i></x-button>

                    @endcan

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
