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
                    <form action="{{route('homework.update',['homework' => $homework])}}" method="POST" class="flex flex-col gap-4">
                        @csrf
                        @method('PUT')
                        <label for="title" class="text-xl font-semibold">title:</label>
                        <input type="text" name="title" id="title" value="{{old('title', $homework->title)}}" class="dark:bg-gray-900">
                        @error('title')
                            <span>{{$message}}</span>
                        @enderror

                        <label for="body" class="text-xl font-semibold">body:</label>
                        <x-text-editor column="body" :value="$homework->body" />
                        @error('body')
                            <span>{{$message}}</span>
                        @enderror

                        <label for="body" class="text-xl font-semibold">deadline:</label>
                        <input name="deadline" x-data x-init="jalaliDatepicker.startWatch({time:true})" value="{{ old('deadline', $homework->deadline) }}" data-jdp class="dark:bg-gray-900" autocomplete="false">
                        @error('deadline')
                            <span>{{$message}}</span>
                        @enderror

                        <label for="body" class="text-xl font-semibold">types:</label>
                        <select name="types[]" id="body" class="dark:bg-gray-900" multiple>
                            @forelse ($types as $type)
                                <option @selected(in_array($type->id,old('types',$homework->types->pluck('id')->toArray()))) value="{{ $type->id }}">{{ $type->name }}</option>
                            @empty

                            @endforelse
                        </select>
                        @error('types')
                            <span>{{$message}}</span>
                        @enderror

                        <button type="submit" class="self-end mx-2 px-3 py-2 bg-green-500 hover:bg-green-400 dark:bg-green-800 dark:hover:bg-green-700 rounded-xl">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
