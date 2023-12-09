<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('add user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('organization.box.store', ['organization' => $organization])}}" method="POST" class="flex flex-col gap-4">
                        @csrf
                        <label for="box" class="text-xl font-semibold">عنوان:</label>
                        <select name="box" id="box" value="{{old('box')}}" class="dark:bg-gray-900">
                            @foreach ($boxes as $box)
                                <option value="{{$box->id}}">{{$box->user->name}}</option>
                            @endforeach
                        </select>
                        @error('box')
                            <span>{{$message}}</span>
                        @enderror
                        <button type="submit" class="self-end mx-2 px-3 py-2 bg-green-500 hover:bg-green-400 dark:bg-green-800 dark:hover:bg-green-700 rounded-xl">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>