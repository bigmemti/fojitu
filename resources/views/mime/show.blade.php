<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Type Show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-8 flex flex-col gap-4">
                        <h2 class="text-xl font-bold">
                            {{__('Type name')}} : <a href="{{ route('type.show', ['type' => $mime->type]) }}" class="font-normal">{{ $mime->type->name }}</a>
                        </h2>
                        <h2 class="text-xl font-bold">
                            {{__('Mime name')}} : <span class="font-normal">{{ $mime->name }}</span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
