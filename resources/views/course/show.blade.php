<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Course Show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-8 flex flex-col gap-4">
                        <h2 class="text-xl font-bold">
                            {{__('Course')}} : <span class="font-normal">{{ $course->name }}</span>
                        </h2>
                        <h2 class="text-xl font-bold">
                            {{__('Teacher')}} : <span class="font-normal">{{ $course->teacher->user->name }}</span>
                        </h2>
                        <h2 class="text-xl font-bold">
                            {{__('Curriculum')}} : <span class="font-normal">{{$course->curriculum->institution->name}} - {{$course->curriculum->major->name}}</span>
                        </h2>
                    </div>
                    @can('viewAny', [App\Models\Session::class, $course])
                        <div class="flex justify-between mb-6">
                            <h3 class="text-xl font-bold">{{__('Sessions')}} :</h3>
                            @can('create', [App\Models\Session::class, $course])
                                <div>
                                    <a class="px-1.5 py-1 bg-green-500 rounded-full" href="{{route('course.session.create', ['course' => $course])}}">
                                        <i class="fa fa-plus" ></i>
                                    </a>
                                </div>
                            @endcan
                        </div>
                        <div>
                            <ol class="list-decimal px-4">
                                @forelse ($course->sessions as $session)
                                <li class="text-xl">
                                    <div class="flex items-center justify-between">
                                        <p class="text-xl">{{ $session->name }}</p>
                                        <div class="text-md py-4">
                                            <x-button :href="route('session.show',['session' => $session])" type="info"><i class="fa-light fa-eye"></i></x-button>
                                            @can('update', $session)
                                                <x-button :href="route('session.edit',['session' => $session])" type="edit"><i class="fa-light fa-pen"></i></x-button>
                                            @endcan
                                            @can('delete', $session)
                                                <form x-data @submit.prevent="
                                                Swal.fire({
                                                    title: '{!!__("Are you sure?")!!}',
                                                    text: '{!!__("You can\'t restore it!")!!}',
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#d33',
                                                    cancelButtonColor: '#666',
                                                    cancelButtonText:'{!!__("Cancel")!!}',
                                                    confirmButtonText: '{!!__("Yes, delete it!")!!}'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        $event.target.submit()
                                                    }
                                                })
                                                " action="{{route('session.destroy', ['session' => $session])}}" method="post" class="inline-block bg-red-500 hover:bg-red-400 dark:bg-red-800 dark:hover:bg-red-700 rounded-xl p-2 px-3">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"><i class="fa-light fa-trash"></i></button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
                                </li>
                                @empty

                                @endforelse
                            </ol>
                        </div>
                    @endcan
                    @can('viewCourseMember', $course)
                        <table class="w-full table-bordered mt-8">
                            <thead>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Actions')}}</th>
                            </thead>
                            <tbody>
                                @forelse ($course->students as $student)
                                    @if($student->user)
                                        <tr>
                                            <td class="text-center">{{$student->user->name}}</td>
                                            <td class="text-center py-4"></td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center py-2">
                                            {{__('There is nothing.')}}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    @endcan
                    {{-- <table class="w-full table-bordered">
                        <thead>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Actions')}}</th>
                        </thead>
                        <tbody>
                            @forelse ($course->sessions as $session)
                                <tr>
                                    <td class="text-center">{{$session->name}}</td>
                                    <td class="text-center py-4">
                                        <x-button :href="route('session.show',['session' => $session])" type="info">show</x-button>
                                        @can('update', $session)
                                            <x-button :href="route('session.edit',['session' => $session])" type="edit">edit</x-button>
                                        @endcan
                                        @can('delete', $session)
                                            <form x-data @submit.prevent="
                                            Swal.fire({
                                                title: '{!!__("Are you sure?")!!}',
                                                text: '{!!__("You can\'t restore it!")!!}',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#d33',
                                                cancelButtonColor: '#666',
                                                cancelButtonText:'{!!__("Cancel")!!}',
                                                confirmButtonText: '{!!__("Yes, delete it!")!!}'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    $event.target.submit()
                                                }
                                            })
                                            " action="{{route('session.destroy', ['session' => $session])}}" method="post" class="inline-block bg-red-500 hover:bg-red-400 dark:bg-red-800 dark:hover:bg-red-700 rounded-xl p-2 px-3">
                                                @csrf
                                                @method('delete')
                                                <button type="submit">delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center py-2">
                                        {{__('There is nothing.')}}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
