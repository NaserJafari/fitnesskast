<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Cursus') }}
        </h2>
    </x-slot>
    @if (auth()->user()->role->name === 'admin' || auth()->user()->role->name === 'coach')
        <div class="px-20 py-6">
            <div class="mr-2 flex justify-end">
                <a href="{{ route('course.create') }}"
                    class="flex w-1/6 items-center justify-center rounded-lg bg-white p-6 shadow-lg">
                    <span class="text-xl font-semibold">Cursus toevoegen</span>
                </a>
            </div>
        </div>
    @endif
    <section class="w-max-full h-auto px-20 py-6">
        <h2 class="mb-6 text-center text-2xl font-semibold">Alle cursussen</h2>
        <div class="rounded-lg bg-gray-400 py-8">
            <div class="mx-auto grid max-w-7xl grid-cols-1 gap-6 px-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($courses as $course)
                    <a href="{{ route('course.show', $course->id) }}"
                        class="flex items-center justify-center rounded-lg bg-white p-6 shadow-lg transition hover:bg-zinc-600 hover:text-white hover:duration-300">
                        <span class="text-xl font-semibold">{{ $course->name }}</span>
                    </a>
                @endforeach
                @if ($courses->isEmpty())
                    <div class="flex items-center justify-center rounded-lg bg-white p-6 shadow-lg">
                        <span class="text-xl font-semibold">Cursussen komen er nog aan!</span>
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-app-layout>
