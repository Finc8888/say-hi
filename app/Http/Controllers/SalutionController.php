<?php

namespace App\Http\Controllers;

use App\Models\Salution;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Inertia\Response;

class SalutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Salutions/Index', [
            'salutions' => Salution::with('user:id,name')->latest()->get(),

        ]);
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->salutions()->create($validated);

        return redirect(route('salutions.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Salution $salution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salution $salution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salution $salution): RedirectResponse
    {
        Gate::authorize('update', $salution);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $salution->update($validated);

        return redirect(route('salutions.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salution $salution)
    {
        //
    }
}
