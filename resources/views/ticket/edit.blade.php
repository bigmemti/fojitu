<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ticket edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('ticket.update' , ['ticket' => $ticket])}}" method="POST" class="flex flex-col gap-4">
                        @csrf
                        @method('patch')
                        <label for="title" class="text-xl font-semibold">عنوان:</label>
                        <input type="text" name="title" id="title" value="{{$ticket->title}}" class="dark:bg-gray-900">
                        @error('title')
                            <span>{{$message}}</span>
                        @enderror
                        <label for="organization" class="text-xl font-semibold">ارگان:</label>
                        <select name="organization_id" id="organization" value="{{old('organization_id')}}" class="dark:bg-gray-900">
                            @foreach ($organizations as $organization)
                                <option value="{{$organization->id}}">{{$organization->name}}</option>
                            @endforeach
                        </select>
                        @error('organization')
                            <span>{{$message}}</span>
                        @enderror
                        <button type="submit" class="self-end mx-2 px-3 py-2 bg-green-500 hover:bg-green-400 dark:bg-green-800 dark:hover:bg-green-700 rounded-xl">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
