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
                        {{__('Course')}} : <a class="font-normal" href="{{ route('course.show', ['course' => $topic->session->course]) }}">{{ $topic->session->course->name }}</a>
                    </h2>

                    <h2 class="text-xl font-bold">
                        {{__('Session')}} : <a class="font-normal" href="{{ route('session.show' , ['session' => $topic->session]) }}">{{$topic->session->name}}</a>
                    </h2>

                    <h2 class="text-xl font-bold">
                        {{__('Topic')}} : <span class="font-normal">{{$topic->name}}</span>
                    </h2>

                    @can('viewAny', [App\Models\Practice::class])
                        <div class="flex justify-between mb-6">
                            <h3 class="text-xl font-bold">{{__('Practices')}} :</h3>
                            @can('create', App\Models\Practice::class)
                                <div>
                                    <a class="px-1.5 py-1 bg-green-500 rounded-full" href="{{route('topic.practice.create', ['topic' => $topic])}}">
                                        <i class="fa fa-plus" ></i>
                                    </a>
                                </div>
                            @endcan
                        </div>
                        <div>
                            <ol>
                                @forelse ($topic->practices as $index => $practice)
                                <li class="text-xl border border-gray-900 px-2 py-2 my-2">
                                    <div class="flex flex-col xl:flex-row items-center xl:justify-between">
                                        <p class="text-xl">{{ $index + 1 }}. {{ $practice->title }}</p>
                                        <div class="text-md py-4">
                                            {{-- <x-button :href="route('practice.show',['practice' => $practice])" type="info"><i class="fa-light fa-eye"></i></x-button> --}}
                                            @can('update', $practice)
                                                <x-button :href="route('practice.edit',['practice' => $practice])" type="edit"><i class="fa-light fa-pen"></i></x-button>
                                            @endcan
                                            @can('delete', $practice)
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
                                                " action="{{route('practice.destroy', ['practice' => $practice])}}" method="post" class="inline-block bg-red-500 hover:bg-red-400 dark:bg-red-800 dark:hover:bg-red-700 rounded-xl p-2 px-3">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"><i class="fa-light fa-trash"></i></button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="p-2 my-4 border border-sky-300 bg-sky-300 bg-opacity-20">
                                        {{ $practice->body }}
                                    </div>
                                    <div class="p-2 my-4 border border-green-300 bg-green-300 bg-opacity-20">
                                        {{ $practice->answer }}
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
                    </table> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
