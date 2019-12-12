<?php

namespace App\Http\Controllers;

use App\Models\Chord;
use App\Models\ChordsSong;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ChordsSongsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //check is admin
        if (!Auth::user()->Admin()){
            return redirect(route('welcome'))->withToastError('No No No!!!');
        }

        $chordsSongs = ChordsSong::get();
        $songs = Song::latest()->get();
        $chords = Chord::get();
        return view('chordsSongs.index', compact('chordsSongs', 'songs', 'chords'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        $field_values_array = $_POST['chord_id'];

        foreach($field_values_array as $value=>$item){
            $schords = new ChordsSong();
            $schords->song_id = $request->input('song_id');
            $schords->chord_id = $item;
            $schords->save();
        }


        return redirect(route('chordsSong.index'))->withToastSuccess('Chords For Song Created Successfully!');
    }

    public function show($id)
    {
        //check is admin
        if (!Auth::user()->Admin()){
            return redirect(route('welcome'))->withToastError('No No No!!!');
        }

        $chordsSong = ChordsSong::with('Song')->with('Chord')->where('song_id', '=', $id)->get();

        return view('chordsSongs.show', compact('chordsSong'));
    }

    public function edit(ChordsSong $chordsSong)
    {
        return back();
    }

    public function update(Request $request, ChordsSong $chordsSong)
    {
        //
    }

    public function destroy($id)
    {
        //delete chordsSong
        $songChords = ChordsSong::with('Song')->where('song_id', '=', $id)->get();
        foreach ($songChords as $s){
            $s->delete($s->id);
        }

        return redirect(route('chordsSongs.index'))->withToastSuccess('ChordsSong Deleted Successfully!');
    }
}
