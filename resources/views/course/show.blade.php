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
                    <div>
                        <p>
                            {{__('Course name')}} : {{$course->name}}
                        </p>
                    </div>
                    <h3>{{__('Sessions')}} :</h3>
                    @can('create', App\Models\Session::class)
                        <div>
                            <a href="{{route('course.session.create', ['course' => $course])}}">+</a>
                        </div>
                    @endcan
                    <table>
                        <thead>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Actions')}}</th>
                        </thead>
                        <tbody>
                            @forelse ($course->sessions as $session)
                                <tr>
                                    <td>{{$session->name}}</td>
                                    <td>
                                        <a href="{{route('session.show',['session' => $session])}}">show</a>
                                        @can('update', $session)
                                            <a href="{{route('session.edit',['session' => $session])}}">edit</a>
                                        @endcan
                                        @can('delete', $session)
                                            <form action="{{route('session.destroy', ['session' => $session])}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit">delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">
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
