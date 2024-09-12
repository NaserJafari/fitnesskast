<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = Subscription::where('id', '>', 2)->get();

        return view('subscription.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subscriptions = Subscription::where('id', '>', 2)->get();

        return view('subscription.edit', compact('subscriptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    // Functie om de abonnement van de gebruiker te wijzigen. De gebruiker zelf of admin/coach kan dit doen.
    // Voor nu alleen de gebruiker zelf
    public function changeSubscription(Request $request)
    {
        $user = auth()->user();
        $user->update(['subscription_id' => $request->subscription_id]);

        return redirect()->route('subscription.index');
    }

    // Functie om het abonnement van de gebruiker te annuleren. De gebruiker zelf of admin/coach kan dit doen. Account wordt verwijderd
    // Voor nu alleen de gebruiker zelf en account wordt niet verwijderd
    public function cancelSubscription(Request $request)
    {
        $user = auth()->user();
        $user->update(['subscription_id' => 2]);

        return redirect()->route('subscription.index');
    }
}
