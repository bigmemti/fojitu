<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Course List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full mt-8 table-bordered">
                        <thead>
                            <tr>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Institution')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($teacher_requests as $teacher_request)
                                <tr>
                                    <td class="text-center">{{$teacher_request->user->name}}</td>
                                    <td class="text-center">{{$teacher_request->institution->name}}</td>
                                    <td class="py-4 text-center">

                                        @can('create', $teacher_request)
                                            <form action="{{route('user.teacher.store', ['user' => $teacher_request->user])}}" method="post" class="inline-block bg-green-500 hover:bg-green-400 hover:text-white hover:cursor-pointer dark:bg-green-800 dark:hover:bg-green-700 rounded-xl p-2 px-3">
                                                @csrf
                                                <input type="hidden" name="institution_id" value="{{ $teacher_request->institution->id }}">
                                                <input type="hidden" name="teacher_request_id" value="{{ $teacher_request->id }}">
                                                <button type="submit"><i class="fa-light fa-check"></i></button>
                                            </form>
                                        @endcan
                                        @can('delete', $teacher_request)
                                            <form action="{{route('teacher_request.destroy', ['teacher_request' => $teacher_request])}}" method="post" class="inline-block bg-red-500 hover:bg-red-400 hover:text-white hover:cursor-pointer dark:bg-red-800 dark:hover:bg-red-700 rounded-xl p-2 px-3">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"><i class="fa-light fa-trash"></i></button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center py-2" colspan="3">
                                        {{__('There is nothing.')}}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
