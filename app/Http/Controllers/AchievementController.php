<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller implements HasMiddleware
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
        $achievements = Achievement::latest()->paginate(8);
        $myAchievements = Achievement::where('user_id', Auth::id())->latest()->paginate(8);

        return view('admin.achievement.index', compact('achievements', 'myAchievements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.achievement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'title' => 'required|max:255|unique:achievements',
            'description' => 'required',
            'banner' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $slug = Str::slug($fields['title']);

        // Upload image if file exist
        $path = null;
        if ($request->hasFile('banner')) {
            $path = Storage::disk('public')->put('achievements-images', $request->banner);
        }

        Auth::user()->achievements()->create([...$fields, 'slug' => $slug, 'banner' => $path]);

        // Redirect
        // return back()->with('success', 'Achievement created successfully');
        return redirect('/achievements')->with('success', 'Prestasi berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Achievement $achievement)
    {
        $latestAchievements = Achievement::latest()->where('id', '!=', $achievement->id)->take(8)->get();

        return view('pages.publikasi.prestasi-show', compact('achievement', 'latestAchievements'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achievement $achievement)
    {
        // authorize
        Gate::authorize('modify', $achievement);
        return view('admin.achievement.edit', compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achievement $achievement)
    {
        // authorize
        Gate::authorize('modify', $achievement);

        // Validate
        $fields = $request->validate([
            'title' => "required|max:255|unique:achievements,title,$achievement->id",
            'description' => 'required',
            'banner' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'delete_banner' => 'nullable|boolean'
        ]);


        $slug = Str::slug($fields['title']);

        // Handle image deletion
        if ($request->has('delete_banner') && $request->delete_banner) {
            if ($achievement->banner) {
                Storage::disk('public')->delete($achievement->banner);
            }
            $fields['banner'] = null;
        }

        // Upload new image if provided
        if ($request->hasFile('banner')) {
            if ($achievement->banner) {
                Storage::disk('public')->delete($achievement->banner);
            }
            $fields['banner'] = Storage::disk('public')->put('achievements-images', $request->banner);
        }


        // Update the achievement
        $achievement->update([...$fields, 'slug' => $slug]);

        return redirect('/achievements')->with('success', "$achievement->title berhasil di-update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $achievement)
    {
        // authorize
        Gate::authorize('modify', $achievement);

        if ($achievement->banner) {
            Storage::disk('public')->delete($achievement->banner);
        }

        $achievement->delete();

        return back()->with('success', "$achievement->title berhasil dihapus");
    }
}
