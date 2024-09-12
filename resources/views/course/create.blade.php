<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Cursus toevoegen') }}
        </h2>
    </x-slot>
    <section class="px-20 py-6">
        <h2 class="mb-6 text-center text-2xl font-semibold">Cursus toevoegen</h2>
        @if ($errors->any())
            <h3 class="text-2xl font-semibold text-black">Er is iets misgegaan</h3>
            <div class="mb-6 rounded-lg bg-red-400 p-8">
                <ul class="font-semibold text-white">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="rounded-lg bg-gray-400 p-8">
            <form action="{{ route('course.store') }}" method="post">
                @csrf
                <label for="name">Naam cursus</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}"
                    class="mb-6 w-full rounded-lg bg-white p-2">
                <label for="description">Beschrijving</label>
                <textarea id="description" name="description" cols="30" rows="10" class="mb-6 w-full rounded-lg bg-white p-2">
                    {{ old('description') }}
                </textarea>
                <label for="max_spot">Max aantal sporters</label>
                <input id="max_spot" type="number" name="max_spot" value="{{ old('max_spot') }}" max="30"
                    min="5" class="mb-6 w-full rounded-lg bg-white p-2">
                <button type="submit"
                    class="w-full rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">Cursus
                    toevoegen
                </button>
            </form>
        </div>
    </section>
</x-app-layout>
