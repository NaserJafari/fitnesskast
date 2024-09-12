<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Cursus toevoegen') }}
        </h2>
    </x-slot>
    <section class="p-12">
        <h2 class="mb-6 text-center text-2xl font-semibold">Cursus toevoegen</h2>
        <div class="rounded-lg bg-gray-400 p-8">
            <form action="{{ route('course.store') }}" method="post">
                @csrf
                <label for="name">Naam cursus</label>
                <input id="name" type="text" name="name" class="mb-6 w-full rounded-lg bg-white p-2" required>
                <label for="description">Beschrijving</label>
                <textarea id="description" name="description" cols="30" rows="10" class="mb-6 w-full rounded-lg bg-white p-2"></textarea>
                <label for="max_spot">Max aantal sporters</label>
                <select id="max_spot" name="max_spot" class="mb-6 w-full rounded-lg bg-white p-2" required>
                    <option disabled selected>Kies maximale aantal sporters</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                </select>
                <button type="submit"
                    class="w-full rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">Cursus
                    toevoegen
                </button>
            </form>
        </div>
    </section>
</x-app-layout>
