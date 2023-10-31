<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Attendance List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full table-bordered">
                        <thead>
                            <th>{{__('Name')}}</th>
                            <th>{{__('State')}}</th>
                            <th>{{__('Actions')}}</th>
                        </thead>
                        <tbody>
                            @forelse ($members as $member)
                                <tr @class($member->pivot ? $attendance::statuses[$member->pivot->status] : null)>
                                    <td class="text-center">{{$member->student->user->name}}</td>
                                    <td class="text-center">{{ $member->pivot? $attendance::statuses[$member->pivot->status] : 'Unknown' }}</td>
                                    <td class="text-center py-4">
                                        @if ($member->pivot)
                                            @if ($member->pivot->status == 0)
                                                <form action="{{route('attendance.update', ['attendance' => $member->pivot->id])}}" method="post"
                                                    class="inline-block bg-red-500 hover:bg-red-400 hover:text-white hover:cursor-pointer
                                                            dark:bg-red-800 dark:hover:bg-red-700 rounded-xl p-2 px-3">
                                                        @csrf
                                                        @method('patch')
                                                        <input type="hidden" name="status" value="1">
                                                        <button type="submit"><i class="fa-thin fa-user-times"></i></button>
                                                </form>
                                            @else
                                                <form action="{{route('attendance.update', ['attendance' => $member->pivot->id])}}" method="post"
                                                    class="inline-block bg-green-500 hover:bg-green-400 hover:text-white hover:cursor-pointer
                                                            dark:bg-green-800 dark:hover:bg-green-700 rounded-xl p-2 px-3">
                                                        @csrf
                                                        @method('patch')
                                                        <input type="hidden" name="status" value="0">
                                                        <button type="submit"><i class="fa-thin fa-user-check"></i></button>
                                                </form>
                                                @if ($member->pivot->status == 1)
                                                    <form action="{{route('attendance.update', ['attendance' => $member->pivot->id])}}" method="post"
                                                        class="inline-block bg-yellow-500 hover:bg-yellow-400 hover:text-white hover:cursor-pointer
                                                                dark:bg-yellow-800 dark:hover:bg-yellow-700 rounded-xl p-2 px-3">
                                                            @csrf
                                                            @method('patch')
                                                            <input type="hidden" name="status" value="2">
                                                            <button type="submit"><i class="fa-thin fa-user-doctor-message"></i></button>
                                                    </form>
                                                @else
                                                    <form action="{{route('attendance.update', ['attendance' => $member->pivot->id])}}" method="post"
                                                        class="inline-block bg-red-500 hover:bg-red-400 hover:text-white hover:cursor-pointer
                                                                dark:bg-red-800 dark:hover:bg-red-700 rounded-xl p-2 px-3">
                                                            @csrf
                                                            @method('patch')
                                                            <input type="hidden" name="status" value="1">
                                                            <button type="submit"><i class="fa-thin fa-user-times"></i></button>
                                                    </form>
                                                @endif
                                            @endif
                                        @else
                                            <form action="{{route('session.attendance.store', ['session' => $session])}}" method="post"
                                                class="inline-block bg-green-500 hover:bg-green-400 hover:text-white hover:cursor-pointer
                                                        dark:bg-green-800 dark:hover:bg-green-700 rounded-xl p-2 px-3">
                                                    @csrf
                                                    <input type="hidden" name="status" value="0">
                                                    <input type="hidden" name="member_id" value="{{ $member->id }}">
                                                    <button type="submit"><i class="fa-thin fa-user-check"></i></button>
                                            </form>
                                            <form action="{{route('session.attendance.store', ['session' => $session])}}" method="post"
                                                class="inline-block bg-red-500 hover:bg-red-400 hover:text-white hover:cursor-pointer
                                                        dark:bg-red-800 dark:hover:bg-red-700 rounded-xl p-2 px-3">
                                                    @csrf
                                                    <input type="hidden" name="status" value="1">
                                                    <input type="hidden" name="member_id" value="{{ $member->id }}">
                                                    <button type="submit"><i class="fa-thin fa-user-times"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-2">
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
