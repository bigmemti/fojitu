<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Organ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @can('create', App\Models\Ticket::class)
                        <div class="my-2">
                            <x-button :href="route('organization.box.create' , ['organization' => $organization])" type="create">
                                <i class="fa fa-plus text-sm"></i> {{ __('Add to organization') }}
                            </x-button>
                        </div>
                    @endcan
                    <table class="w-full mt-8 table-bordered">
                        <thead>
                            <tr>
                                <th>{{__('Name')}}</th>
                                <th>{{__('members')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($organization)
                                <tr>
                                    <td class="text-center">{{$organization->name}}</td>
                                    <td class="py-4 text-center">
                                        @foreach ($organization->boxes as $box )
                                            ,{{$box->user->name}}
                                        @endforeach
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="text-center py-2" colspan="2">
                                        {{__('There is nothing.')}}
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
