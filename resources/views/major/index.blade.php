<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Major List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @can('create', App\Models\Major::class)
                        <div class="my-2">
                            <x-button :href="route('major.create')" type="create">
                                <i class="fa fa-plus text-sm"></i> {{ __('Create new major.') }}
                            </x-button>
                        </div>
                    @endcan
                    <table class="w-full mt-8 table-bordered">
                        <thead>
                            <tr>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($majors as $major)
                                <tr>
                                    <td class="text-center">{{$major->name}}</td>
                                    <td class="py-4 text-center">
                                        <x-button :href="route('major.show',['major' => $major])" type="info"><i class="fa-light fa-eye"></i></x-button>
                                        @can('update', $major)
                                            <x-button :href="route('major.edit',['major' => $major])" type="edit"><i class="fa-light fa-pen"></i></x-button>
                                        @endcan
                                        @can('delete', $major)
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
                                            " action="{{route('major.destroy', ['major' => $major])}}" method="post" class="inline-block bg-red-500 hover:bg-red-400 hover:text-white hover:cursor-pointer dark:bg-red-800 dark:hover:bg-red-700 rounded-xl p-2 px-3">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"><i class="fa-light fa-trash"></i></button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center py-2" colspan="2">
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
