<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Topic Show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col  gap-4 p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-bold">
                        {{__('Cource name')}} : <a class="font-normal" href="{{ route('course.show', ['course' => $topic->session->course]) }}">{{ $topic->session->course->name }}</a>
                    </h2>

                    <h3 class="text-lg font-bold">
                        {{__('Session name')}} : <a class="font-normal" href="{{ route('session.show' , ['session' => $topic->session]) }}">{{$topic->session->name}}</a>
                    </h3>

                    <h3 class="text-md font-bold">
                        {{__('topic name')}} : <span class="font-normal">{{$topic->name}}</span>
                    </h3>

                    <h3>{{__('Practices')}} :</h3>

                    @can('create', App\Models\Practice::class)
                        <div>
                            <a href="{{route('topic.practice.create', ['topic' => $topic])}}">+</a>
                        </div>
                    @endcan

                    <table>
                        <thead>
                            <th>{{__('Title')}}</th>
                            <th>{{__('Actions')}}</th>
                        </thead>
                        <tbody>
                            @forelse ($topic->practices as $practice)
                                <tr>
                                    <td>{{$practice->title}}</td>
                                    <td>
                                        <a href="{{ route('practice.show', ['practice' => $practice]) }}">show</a>
                                        @can('update', $practice)
                                            <a href="{{route('practice.edit',['practice' => $practice])}}">edit</a>
                                        @endcan
                                        @can('delete', $practice)
                                            <form action="{{route('practice.destroy', ['practice' => $practice])}}" method="post">
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
