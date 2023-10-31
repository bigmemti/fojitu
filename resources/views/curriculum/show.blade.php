<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Curriculum Show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-8 flex flex-col gap-4">
                        <h2 class="text-xl font-bold">
                            {{__('Institution name')}} : <a class="font-normal" href="{{ route('institution.show', ['institution' => $curriculum->institution]) }}">{{ $curriculum->institution->name }}</a>
                        </h2>

                        <h2 class="text-xl font-bold">
                            {{__('Major name')}} : <a class="font-normal" href="{{ route('major.show', ['major' => $curriculum->major]) }}">{{ $curriculum->major->name }}</a>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
