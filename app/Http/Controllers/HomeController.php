<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class HomeController extends Controller
{
/*    public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index()
    {
        $bandsCount = count(Band::get());
        $bands = Band::latest()->take(12)->get();

        return view('welcome', compact('bandsCount', 'bands'));
    }
}
