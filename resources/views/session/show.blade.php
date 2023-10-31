<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Session Show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col  gap-4 p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-bold">
                        {{__('Course')}} : <a class="font-normal" href="{{ route('course.show', ['course' => $session->course]) }}">{{ $session->course->name }}</a>
                    </h2>

                    <h2 class="text-xl font-bold">
                        {{__('Session')}} : <span class="font-normal">{{$session->name}}</span>
                    </h2>

                    @can('viewAny', [App\Models\Attendance::class, $session])
                        <div>
                            <x-button :href="route('session.attendance.index', ['session' => $session])" type="info">
                                <i class="fa-thin fa-user"></i>
                            </x-button>
                        </div>
                    @endcan
                    @can('viewAny', [App\Models\Topic::class, $session])
                        <div class="flex justify-between mb-6 items-center">
                            <h3 class="text-xl font-bold">{{__('Topics')}} :</h3>
                            @can('create', App\Models\Topic::class)
                                <div>
                                    <a class="px-1.5 py-1 bg-green-500 rounded-full" href="{{route('session.topic.create', ['session' => $session])}}">
                                        <i class="fa fa-plus" ></i>
                                    </a>
                                </div>
                            @endcan
                        </div>
                        <div>
                            <ol class="px-4">
                                @forelse ($session->topics as $index => $topic)
                                <li class="text-xl">
                                    <div class="flex flex-col lg:flex-row items-center lg:justify-between">
                                        <p class="text-xl">
                                            {{ $index + 1 }}. {{ $topic->name }}
                                            @if ($topic->practices()->count() !== 0)
                                                <span class="text-xs text-gray-500">
                                                    {{ __('practices') }} : {{ $topic->practices()->limit(5)->get()->pluck('title')->map(fn($item) => str()->limit($item, 20, '...'))->implode(',') }}
                                                </span>
                                            @endif
                                        </p>
                                        <div class="text-md py-4">
                                            <x-button :href="route('topic.show',['topic' => $topic])" type="info"><i class="fa-light fa-eye"></i></x-button>
                                            @can('update', $topic)
                                                <x-button :href="route('topic.edit',['topic' => $topic])" type="edit"><i class="fa-light fa-pen"></i></x-button>
                                            @endcan
                                            @can('delete', $topic)
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
                                                " action="{{route('topic.destroy', ['topic' => $topic])}}" method="post" class="inline-block bg-red-500 hover:bg-red-400 dark:bg-red-800 dark:hover:bg-red-700 rounded-xl p-2 px-3">
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
                    {{-- <table>
                        <thead>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Actions')}}</th>
                        </thead>
                        <tbody>
                            @forelse ($session->topics as $topic)
                                <tr>
                                    <td>{{$topic->name}}</td>
                                    <td>
                                        <a href="{{ route('topic.show', ['topic' => $topic]) }}">show</a>
                                        @can('update', $topic)
                                            <a href="{{route('topic.edit',['topic' => $topic])}}">edit</a>
                                        @endcan
                                        @can('delete', $topic)
                                            <form action="{{route('topic.destroy', ['topic' => $topic])}}" method="post">
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
                    </table> --}}

                    @can('viewAny', [App\Models\HomeWork::class, $session])
                        <div class="flex justify-between mb-6 items-center">
                            <h3 class="text-xl font-bold">{{__('Homeworks')}} :</h3>
                            @can('create', App\Models\Homework::class)
                                <div>
                                    <a class="px-1.5 py-1 bg-green-500 rounded-full" href="{{route('session.homework.create', ['session' => $session])}}">
                                        <i class="fa fa-plus" ></i>
                                    </a>
                                </div>
                            @endcan
                        </div>
                        <div>
                            <ol>
                                @forelse ($session->homeworks as $index => $homework)
                                <li class="text-xl border border-gray-900 px-2 py-2 my-2">
                                    <div class="flex flex-col lg:flex-row items-center lg:justify-between">
                                        <p class="text-xl">{{ $index + 1 }}. {{ $homework->title }} <span class="text-sm text-gray-500">@if($homework->deadline){{ __('deadline') }} : {{ $homework->deadline }}@endif</span></p>
                                        <div class="text-md py-4">
                                            <x-button :href="route('homework.show',['homework' => $homework])" type="info"><i class="fa-light fa-eye"></i></x-button>
                                            @can('update', $homework)
                                                <x-button :href="route('homework.edit',['homework' => $homework])" type="edit"><i class="fa-light fa-pen"></i></x-button>
                                            @endcan
                                            @can('delete', $homework)
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
                                                " action="{{route('homework.destroy', ['homework' => $homework])}}" method="post" class="inline-block bg-red-500 hover:bg-red-400 dark:bg-red-800 dark:hover:bg-red-700 rounded-xl p-2 px-3">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"><i class="fa-light fa-trash"></i></button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="p-2 my-4 border border-sky-300 bg-sky-300 bg-opacity-20">
                                        {{ $homework->body }}
                                    </div>
                                </li>
                                @empty

                                @endforelse
                            </ol>
                        </div>
                    @endcan

                    {{-- <table>
                        <thead>
                            <th>{{__('Title')}}</th>
                            <th>{{__('Actions')}}</th>
                        </thead>
                        <tbody>
                            @forelse ($session->homeworks as $homework)
                                <tr>
                                    <td>{{$homework->title}}</td>
                                    <td>
                                        @can('update', $homework)
                                            <a href="{{route('homework.edit',['homework' => $homework])}}">edit</a>
                                        @endcan
                                        @can('delete', $homework)
                                            <form action="{{route('homework.destroy', ['homework' => $homework])}}" method="post">
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
                    </table> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
