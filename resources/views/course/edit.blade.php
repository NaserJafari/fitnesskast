<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Cursus {{ $course->name }} aanpassen
        </h2>
    </x-slot>
    <section class="px-20 py-6">
        <h2 class="mb-6 text-center text-2xl font-semibold">Cursus {{ $course->name }} aanpassen</h2>
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
            <form action="{{ route('course.update', $course->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="name">Naam cursus</label>
                <input id="name" type="text" name="name" value="{{ old('name', $course->name) }}"
                    class="mb-6 w-full rounded-lg bg-white p-2">
                <label for="description">Beschrijving</label>
                <textarea id="description" name="description" cols="30" rows="10" class="mb-6 w-full rounded-lg bg-white p-2">
                    {{ old('description', $course->description) }}
                </textarea>
                <label for="max_spot">Max aantal sporters</label>
                <input id="max_spot" type="number" name="max_spot" value="{{ $course->max_spot }}" max="30"
                    min="5" class="mb-6 w-full rounded-lg bg-white p-2">
                <button type="submit"
                    class="w-full rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">Cursus
                    aanpassen
                </button>
            </form>
        </div>
    </section>
</x-app-layout>
