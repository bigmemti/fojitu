<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full mt-8 table-bordered">
                        <thead>
                            <tr>
                                <th>{{$ticket->title}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($ticket)
                                @foreach ($ticket->messages as $message )
                                    <tr>
                                        @if (auth()->user()->box->user_id == $message->box->user_id)
                                            <td class="text-right" style="color: red">{{$message->message}}</td>
                                            <td>
                                                @can('update', $message)
                                                    <x-button :href="route('message.edit',['message' => $message , 'ticket' => $ticket])" type="edit"><i class="fa-light fa-pen"></i></x-button>
                                                @endcan
                                                @can('delete', $message)
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
                                                    " action="{{route('message.destroy', ['message' => $message])}}" method="post" class="inline-block bg-red-500 hover:bg-red-400 hover:text-white hover:cursor-pointer dark:bg-red-800 dark:hover:bg-red-700 rounded-xl p-2 px-3">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"><i class="fa-light fa-trash"></i></button>
                                                    </form>
                                                @endcan
                                            </td>
                                        @else
                                            <td class="text-right" style="color: blue">{{$message->message}}</td>
                                            <td></td>
                                        @endif
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center py-2" colspan="2">
                                        {{__('There is nothing.')}}
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <form action="{{route('ticket.message.store' , ["ticket" => $ticket])}}" method="POST" class="flex flex-col gap-4">
                        @csrf
                        <br><br>
                        <label for="message" class="text-xl font-semibold">پیام جدید:</label>
                        <textarea name="message" id="message" class="dark:bg-gray-900"></textarea>
                        @error('message')
                            <span>{{$message}}</span>
                        @enderror
                        <button type="submit" class="self-end mx-2 px-3 py-2 bg-green-500 hover:bg-green-400 dark:bg-green-800 dark:hover:bg-green-700 rounded-xl">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
