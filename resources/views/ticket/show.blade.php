<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full mt-8 table-bordered">
                        <thead>
                            <tr>
                                <th>{{$ticket->title}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($ticket)
                                @foreach ($ticket->messages as $message )
                                    <tr><td>{{$message->message}}</td></tr>
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
