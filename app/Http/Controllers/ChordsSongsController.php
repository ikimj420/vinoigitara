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

        $chordsSongs = ChordsSong::latest()->get();
        $songs = Song::latest()->paginate(9);
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

        $chordsSongs = ChordsSong::with('Song')->with('Chord')->where('song_id', '=', $id)->get();
        $songs = Song::latest()->get();
        $chords = Chord::latest()->get();

        return view('chordsSongs.show', compact('chordsSongs', 'songs', 'chords'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, $id)
    {
        $chordsSongs = ChordsSong::with('Song')->with('Chord')->where('song_id','=', $id)->get();

        foreach ($chordsSongs as $s){
            $s->song_id = $request->input('song_id');
            $s->chord_id = $request->input( $s->id.'chord_id');

            $s->save();
        }

        return redirect(route('chordsSong.index'))->withToastSuccess('ChordsSong Updated Successfully!');
    }

    public function destroy($id)
    {
        //delete chordsSong
        $chordsSong = ChordsSong::with('Song')->where('song_id', '=', $id)->get();
        foreach ($chordsSong as $s){
            $s->delete($s->id);
        }

        return redirect(route('chordsSong.index'))->withToastSuccess('ChordsSong Deleted Successfully!');
    }
}
