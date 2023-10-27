<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Type Show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-8 flex flex-col gap-4">
                        <h2 class="text-xl font-bold">
                            {{__('Type name')}} : <span class="font-normal">{{ $type->name }}</span>
                        </h2>
                        <div class="flex justify-between mb-6">
                            <h3 class="text-xl font-bold">{{__('Mimes')}} :</h3>
                            @can('create', App\Models\Mime::class)
                                <div>
                                    <a class="px-1.5 py-1 bg-green-500 rounded-full" href="{{route('type.mime.create', ['type' => $type])}}">
                                        <i class="fa fa-plus" ></i>
                                    </a>
                                </div>
                            @endcan
                        </div>
                        <table class="w-full table-bordered mt-8">
                            <thead>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Actions')}}</th>
                            </thead>
                            <tbody>
                                @forelse ($type->mimes as $mime)
                                    <tr>
                                        <td class="text-center">{{$mime->name}}</td>
                                        <td class="text-center py-4"></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center py-2">
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
    </div>
</x-app-layout>
