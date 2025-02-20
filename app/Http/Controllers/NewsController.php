<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller implements HasMiddleware
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
        $news = News::latest()->paginate(8);
        $myNews = News::where('user_id', Auth::id())->latest()->paginate(8);
        return view('admin.news.index', compact('news', 'myNews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'title' => 'required|max:255|unique:news',
            'content' => 'required',
            'banner' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $slug = Str::slug($fields['title']);

        // Upload image if file exist
        $path = null;
        if ($request->hasFile('banner')) {
            $path = Storage::disk('public')->put('news-images', $request->banner);
        }

        Auth::user()->news()->create([...$fields, 'slug' => $slug, 'banner' => $path]);

        // Redirect
        // return back()->with('success', 'News created successfully');
        return redirect('/news')->with('success', 'Berita berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $latestNews = News::latest()->where('id', '!=', $news->id)->take(8)->get();

        return view('pages.publikasi.berita-show', compact('news', 'latestNews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        // authorize
        Gate::authorize('modify', $news);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        // authorize
        Gate::authorize('modify', $news);

        // Validate
        $fields = $request->validate([
            'title' => "required|max:255|unique:news,title,$news->id",
            'content' => 'required',
            'banner' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'delete_banner' => 'nullable|boolean'
        ]);


        $slug = Str::slug($fields['title']);

        // Handle image deletion
        if ($request->has('delete_banner') && $request->delete_banner) {
            if ($news->banner) {
                Storage::disk('public')->delete($news->banner);
            }
            $fields['banner'] = null;
        }

        // Upload new image if provided
        if ($request->hasFile('banner')) {
            if ($news->banner) {
                Storage::disk('public')->delete($news->banner);
            }
            $fields['banner'] = Storage::disk('public')->put('news-images', $request->banner);
        }


        // Update the news
        $news->update([...$fields, 'slug' => $slug]);

        return redirect('/news')->with('success', "$news->title berhasil di-update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        // authorize
        Gate::authorize('modify', $news);

        if ($news->banner) {
            Storage::disk('public')->delete($news->banner);
        }

        $news->delete();

        return back()->with('success', "$news->title berhasil dihapus");
    }
}
