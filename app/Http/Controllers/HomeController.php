<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Chord;

class HomeController extends Controller
{
    public function index()
    {
        $bandsCount = count(Band::get());
        $chordsCount = count(Chord::get());
        $bands = Band::latest()->take(12)->get();

        return view('welcome', compact('bandsCount', 'chordsCount', 'bands'));
    }
}
