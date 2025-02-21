<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Agenda;
use App\Models\Galery;
use App\Models\News;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $latestNews = News::latest()->take(4)->get();
        $latestGaleries = Galery::latest()->take(8)->get();
        return view("welcome", compact('latestNews', 'latestGaleries'));
    }

    // publikasi
    public function prestasi()
    {
        $achievements = Achievement::latest()->paginate(4);
        return view('pages.publikasi.prestasi', compact('achievements'));
    }
    public function agenda()
    {
        $agendas = Agenda::orderBy('date')->paginate(8);
        return view('pages.publikasi.agenda', compact('agendas'));
    }

    public function berita()
    {
        $news = News::latest()->paginate(8);
        return view('pages.publikasi.berita', compact('news'));
    }

    public function galery()
    {
        $galeries = Galery::latest()->paginate(12);
        return view('pages.publikasi.galery', compact('galeries'));
    }
}
