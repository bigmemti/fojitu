<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Submission Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col gap-4">
                        <h2 class="text-xl font-bold">
                            {{__('Course')}} : <a class="font-normal" href="{{ route('course.show', ['course' => $submission->homework->session->course]) }}">{{ $submission->homework->session->course->name }}</a>
                        </h2>

                        <h2 class="text-xl font-bold">
                            {{__('Session')}} : <a href="{{ route('session.show', ['session' => $submission->homework->session])}}" class="font-normal">{{$submission->homework->session->name}}</a>
                        </h2>

                        <h2 class="text-xl font-bold">
                            {{__('Homework')}} : <span class="font-normal">{{$submission->homework->title}}</span>
                        </h2>

                        <h2 class="text-xl font-bold">
                            {{__('deadline')}} : <span class="font-normal">{{$submission->homework->deadline}}</span>
                        </h2>
                    </div>
                    <form action="{{route('submission.update',['submission' => $submission])}}" method="POST" class="flex flex-col gap-4" enctype="multipart/form-data" >
                        @csrf
                        @method('patch')
                        <label for="answer" class="text-xl font-semibold">answer:</label>
                        <textarea name="answer" id="answer" class="dark:bg-gray-900">{{old('answer', $submission->answer)}}</textarea>
                        @error('answer')
                            <span>{{$message}}</span>
                        @enderror

                        <label for="files" class="text-xl font-semibold">files:</label>
                        <div class="flex flex-col gap-4">
                            @forelse ($submission->files as $file )
                                <div class="flex justify-between">
                                    <div class="text-lg">{{ $file->name }}</div>
                                    <div class="flex gap-4">
                                        <a class="p-2 bg-green-800 rounded-lg" href="{{ route('file.download', ['file' => $file]) }}">
                                            <i class="fa-thin fa-download"></i>
                                        </a>
                                        <button x-data
                                            @click.prevent="
                                                const form = document.createElement('form');
                                                form.method = 'post'
                                                form.action = @js(route('fileable.destroy', ['fileable' => $file->pivot->id]))

                                                const csrf = document.createElement('input');
                                                const method = document.createElement('input');

                                                csrf.type = 'hidden';
                                                csrf.name = '_token';
                                                csrf.value = @js(csrf_token());

                                                method.type = 'hidden';
                                                method.name = '_method';
                                                method.value = 'delete';

                                                form.appendChild(csrf);
                                                form.appendChild(method);
                                                
                                                document.body.appendChild(form);
                                                form.submit();
                                            "
                                            class="p-2 px-2.5 bg-red-800 rounded-lg"
                                            href="{{ route('file.download', ['file' => $file]) }}">
                                            <i class="fa-thin fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            @empty

                            @endforelse
                        </div>
                        <input type="file" name="files[]" multiple >
                        @error('files')
                            <span>{{$message}}</span>
                        @enderror
                        @error('files.*')
                            <span>{{$message}}</span>
                        @enderror

                        <button type="submit" class="self-end mx-2 px-3 py-2 bg-green-500 hover:bg-green-400 dark:bg-green-800 dark:hover:bg-green-700 rounded-xl">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
