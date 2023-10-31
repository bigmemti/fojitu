<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Institution Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('curriculum.update',['curriculum' => $curriculum])}}" method="POST" class="flex flex-col gap-4">
                        @csrf
                        @method('patch')
                        <label for="institution_id" class="text-xl font-semibold">{{ __('Institution') }}:</label>
                        <select name="institution_id" id="institution_id" class="dark:bg-gray-900">
                            @foreach ($institutions as $institution )
                                <option @selected($curriculum->institution_id === $institution->id) value="{{ $institution->id }}">{{ $institution->name }}</option>
                            @endforeach
                        </select>
                        @error('institution_id')
                            <span>{{$message}}</span>
                        @enderror

                        <label for="major_id" class="text-xl font-semibold">{{ __('Major') }}:</label>
                        <select name="major_id" id="major_id" class="dark:bg-gray-900">
                            @foreach ($majors as $major )
                                <option @selected($curriculum->major_id === $major->id) value="{{ $major->id }}">{{ $major->name }}</option>
                            @endforeach
                        </select>
                        @error('major_id')
                            <span>{{$message}}</span>
                        @enderror
                        <input type="hidden" name="record" value="foo">
                        @error('record')
                            <span>{{$message}}</span>
                        @enderror
                        <button type="submit" class="self-end mx-2 px-3 py-2 bg-green-500 hover:bg-green-400 dark:bg-green-800 dark:hover:bg-green-700 rounded-xl">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
