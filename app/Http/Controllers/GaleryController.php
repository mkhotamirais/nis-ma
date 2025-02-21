<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class GaleryController extends Controller implements HasMiddleware
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
        Gate::allowIf(fn(User $user) => $user->role === 'admin' || $user->role === 'editor');

        $galeries = Galery::latest()->paginate(8);
        $myGaleries = Galery::where('user_id', Auth::id())->latest()->paginate(8);
        return view('admin.galery.index', compact('galeries', 'myGaleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::allowIf(fn(User $user) => $user->role === 'admin' || $user->role === 'editor');

        return view('admin.galery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::allowIf(fn(User $user) => $user->role === 'admin' || $user->role === 'editor');

        // Validate
        $fields = $request->validate([
            'caption' => 'required|max:255|unique:galeries',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $slug = Str::slug($fields['caption']);

        // Upload image if file exist
        $path = null;
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('galeries-images', $request->image);
        }

        Auth::user()->galeries()->create([...$fields, 'slug' => $slug, 'image' => $path]);

        // Redirect
        return redirect('/galeries')->with('success', 'Image berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Galery $galery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galery $galery)
    {
        // authorize
        Gate::authorize('modify', $galery);
        return view('admin.galery.edit', compact('galery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galery $galery)
    {
        // authorize
        Gate::authorize('modify', $galery);

        // Validate
        $fields = $request->validate([
            'caption' => "required|max:255|unique:galeries,caption,$galery->id",
            'image' => [
                Rule::requiredIf(!$galery->image), // Required jika tidak ada image sebelumnya
                'file',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:1024'
            ],
        ]);

        $slug = Str::slug($fields['caption']);

        // Upload new image if provided
        if ($request->hasFile('image')) {
            if ($galery->image) {
                Storage::disk('public')->delete($galery->image);
            }
            $fields['image'] = Storage::disk('public')->put('galeries-images', $request->image);
        }

        // Update the galery
        $galery->update([...$fields, 'slug' => $slug]);

        return redirect('/galeries')->with('success', "$galery->title berhasil di-update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galery $galery)
    {
        // authorize
        Gate::authorize('modify', $galery);

        if ($galery->image) {
            Storage::disk('public')->delete($galery->image);
        }

        $galery->delete();

        return back()->with('success', "$galery->caption berhasil dihapus");
    }
}
