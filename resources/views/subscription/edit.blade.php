<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Abonnement aanpassen') }}
        </h2>
    </x-slot>
    <section class="px-20 py-6">
        <h2 class="mb-6 text-center text-2xl font-semibold">Abonnement {{ auth()->user()->subscription->name }}</h2>
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
            <form action="{{ route('subscription.change', auth()->user()->id) }}" method="post">
                @csrf
                <label for="subscription_id">Abonnement</label>
                <select id="subscription_id" name="subscription_id" class="mb-6 w-full rounded-lg bg-white p-2">
                    @foreach ($subscriptions as $subscription)
                        <option value="{{ $subscription->id }}" @selected(old('subscription_id', auth()->user()->subscription->id) == $subscription->id)>
                            {{ $subscription->name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit"
                    class="w-full rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">Abonnement
                    aanpassen
                </button>
            </form>
        </div>
        <div class="mt-4 rounded-lg">
            <form action="{{ route('subscription.cancel', auth()->user()->id) }}" method="post">
                @csrf
                <button type="submit"
                    class="w-full rounded bg-red-500 px-4 py-2 font-bold text-white hover:bg-red-700">Abonnement
                    opzeggen
                </button>
            </form>
        </div>
    </section>
</x-app-layout>
