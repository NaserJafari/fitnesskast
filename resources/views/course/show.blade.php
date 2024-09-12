<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Cursus' . ' ' . $course->name) }}
        </h2>
    </x-slot>
    <section class="w-full p-6">
        <h2 class="mb-6 text-center text-2xl font-semibold">{{ $course->name }}</h2>
        {{-- Edit en delete buttons worden alleen getoond als de gebruiker een admin of coach is.  --}}

        @if (auth()->user()->role->name === 'admin' || auth()->user()->role->name === 'coach')
            <div class="flex justify-center">
                <a href="{{ route('course.edit', $course->id) }}"
                    class="mr-2 rounded-lg bg-blue-400 px-4 py-2 font-semibold text-white">Cursus aanpassen</a>
                <form action="{{ route('course.destroy', $course->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-lg bg-red-400 px-4 py-2 font-semibold text-white">Cursus
                        verwijderen</button>
                </form>
            </div>
        @endif
        <div class="grid grid-cols-3 gap-4 rounded-lg bg-gray-100 p-6">
            <!-- Hier komen toekomstige foto's -->
            <div class="col-span-1 rounded-lg bg-gray-300 p-8 text-center">
                <p>Hier komt de foto('s) van de cursus</p>
            </div>

            <!-- Hier kunnen sporters zich inschrijven voor de cursus  -->
            <div class="col-span-1 flex flex-col items-center">
                @if (auth()->user()->subscribedCourses->contains($course->id))
                    <h3>Je bent ingeschreven voor deze cursus</h3>
                    <form action="{{ route('course.unenroll', $course->id) }}" method="post">
                        @csrf
                        <button type="submit" class="mb-4 rounded-lg bg-red-400 px-4 py-2 font-semibold text-white">
                            Uitschrijven
                        </button>
                    </form>
                @else
                    <form action="{{ route('course.enroll', $course->id) }}" method="post">
                        @csrf
                        <button type="submit" class="mb-4 rounded-lg bg-cyan-400 px-4 py-2 font-semibold text-white">
                            Inschrijven
                        </button>
                    </form>
                @endif
                <p class="rounded-lg bg-gray-200 px-4 py-1 text-sm">Aantal plek = {{ $course->max_spot }}</p>
            </div>

            <!-- Beschrijving van de cursus -->
            <div class="col-span-1 rounded-lg bg-gray-300 p-8">
                <p>{{ $course->description ?? 'Hier komt de beschrijving over de cursus' }}</p>
            </div>
        </div>
    </section>
</x-app-layout>
