<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Teacher Request') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('In this section, you can apply to become a teacher.') }}
        </p>
    </header>

    <form method="post" action="{{ route('user.teacher_request.store', ['user' => $user]) }}" class="mt-6 space-y-6">
        @csrf
        <div>
            <x-input-label for="institution_id" :value="__('Institution')" />
            <select name="institution_id" id="institution_id" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="">{{ __('Choose one.') }}</option>
                @forelse ($institutions as $institution)
                    <option @selected(old('institution_id')) value="{{ $institution->id }}">{{ $institution->name }}</option>
                @empty

                @endforelse
            </select>
            <x-input-error :messages="$errors->get('institution_id')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Request') }}</x-primary-button>
        </div>
    </form>
</section>
