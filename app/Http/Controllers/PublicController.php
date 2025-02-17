<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        return view("welcome");
    }

    public function ppdb()
    {
        return view("pages.ppdb");
    }

    public function contact()
    {
        return view("pages.contact");
    }

    // Profile
    public function sambutan()
    {
        return view('pages.profile.sambutan');
    }

    public function guru_staff()
    {
        return view('pages.profile.guru-staff');
    }

    public function tentang()
    {
        return view('pages.profile.tentang');
    }

    // publikasi
    public function agenda()
    {
        return view('pages.publikasi.agenda');
    }

    public function berita()
    {
        return view('pages.publikasi.berita');
    }

    public function galery()
    {
        return view('pages.publikasi.galery');
    }
}
