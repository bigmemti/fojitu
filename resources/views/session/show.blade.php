<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Session Show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <p>
                            {{__('Sessions name')}} : {{$session->name}}
                        </p>
                    </div>
                    <h3>{{__('Topics')}} :</h3>
                    @can('create', App\Models\Topic::class)
                        <div>
                            <a href="{{route('session.topic.create', ['session' => $session])}}">+</a>
                        </div>
                    @endcan
                    <table>
                        <thead>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Actions')}}</th>
                        </thead>
                        <tbody>
                            @forelse ($session->topics as $topic)
                                <tr>
                                    <td>{{$topic->name}}</td>
                                    <td>
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
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
