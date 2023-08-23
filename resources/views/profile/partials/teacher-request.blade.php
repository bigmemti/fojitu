<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Teacher Request') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('In this section, you can apply to become a teacher.') }}
        </p>
    </header>

    <form method="post" action="{{ route('user.teacher.store', ['user' => $user]) }}" class="mt-6 space-y-6">
        @csrf

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Request') }}</x-primary-button>
        </div>
    </form>
</section>
