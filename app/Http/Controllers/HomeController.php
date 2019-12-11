<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Chord;
use App\Models\Song;

class HomeController extends Controller
{
    public function index()
    {
        $bandsCount = count(Band::get());
        $chordsCount = count(Chord::get());
        $songsCount = count(Song::get());
        $bands = Band::latest()->take(12)->get();
        $songs = Song::latest()->take(1)->get();

        return view('welcome', compact('bandsCount', 'chordsCount', 'songsCount', 'bands', 'songs'));
    }

    public function rand()
    {
        $songs = Song::inRandomOrder()->take(9)->get();

        return view('songs.songRandom', compact('songs'));
    }
}
