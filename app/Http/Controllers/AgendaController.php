<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AgendaController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            // new Middleware('auth', only: ['store']),
            new Middleware('auth', except: ['show']),
            // new Middleware('auth'),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendas = Agenda::latest()->paginate(8);
        $myAgendas = Agenda::where('user_id', Auth::id())->latest()->paginate(8);

        return view('admin.agenda.index', compact('agendas', 'myAgendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'title' => 'required|string|max:255|unique:agendas,title',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'time' => 'nullable|date_format:H:i:s',
            'location' => 'nullable|string|max:255',
            'status' => 'required|in:upcoming,ongoing,completed',
        ]);

        $slug = Str::slug($fields['title']);

        Auth::user()->agendas()->create([...$fields, 'slug' => $slug]);

        // Redirect
        return redirect('/agendas')->with('success', 'Agenda berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        // authorize
        Gate::authorize('modify', $agenda);
        return view('admin.agenda.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        // authorize
        Gate::authorize('modify', $agenda);

        // Validate
        $fields = $request->validate([
            'title' => "required|string|max:255|unique:agendas,title,$agenda->id",
            'description' => 'nullable|string',
            'date' => 'required|date',
            'time' => 'nullable|date_format:H:i:s',
            'location' => 'nullable|string|max:255',
            'status' => 'required|in:upcoming,ongoing,completed',
        ]);

        $slug = Str::slug($fields['title']);

        $agenda->update([...$fields, 'slug' => $slug]);

        // Redirect
        return redirect('/agendas')->with('success', "$agenda->title berhasil di-update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        // authorize
        Gate::authorize('modify', $agenda);

        $agenda->delete();

        return back()->with('success', "$agenda->title berhasil dihapus");
    }
}
