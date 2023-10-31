<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Student Form') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Enter your student information if you want to use the application.') }}
        </p>
    </header>

    <form method="post" action="{{ route('user.student.store', ['user' => $user]) }}" class="mt-6 space-y-6">
        @csrf
        <div>
            <x-input-label for="curriculum_id" :value="__('Curriculum')" />
            <select name="curriculum_id" id="curriculum_id" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="">{{ __('Choose one.') }}</option>
                @forelse ($curricula as $curriculum)
                    <option @selected(old('curriculum_id', $user->student?->curriculum_id) == $curriculum->id) value="{{ $curriculum->id }}">{{ $curriculum->institution->name }} - {{ $curriculum->major->name }}</option>
                @empty

                @endforelse
            </select>
            <x-input-error :messages="$errors->get('curriculum_id')" class="mt-2" />
            </div>

        <div>
            <x-input-label for="student_id" :value="__('Student id')" />
            <x-text-input id="student_id" name="student_id" :value="old('student_id', $user->student?->student_id)" type="number" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Submit') }}</x-primary-button>
        </div>
    </form>
</section>
