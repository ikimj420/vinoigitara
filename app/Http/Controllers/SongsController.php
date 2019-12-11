<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SongsController extends Controller
{
    public function index()
    {
        $bands = Band::latest()->get();
        $songs = Song::latest()->get();
        return view('songs.index', compact('bands', 'songs'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        //validate save band
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'video' => 'required',
            'song' => 'required',
            'band_id' => 'required',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $song = new Song();

        $song->title = htmlspecialchars($request->title);
        $song->video = htmlspecialchars($request->video);
        $song->song = $request->song;
        $song->band_id = htmlspecialchars($request->band_id);

        $song->save();


        return redirect(route('song.index'))->withToastSuccess('Song Created Successfully!');
    }

    public function show(Song $song)
    {
        //Bands
        $bands = Band::latest()->get();
        return view('songs.show', compact('song', 'bands'));
    }

    public function edit(Song $song)
    {
        return back();
    }

    public function update(Request $request, Song $song)
    {
        //validate update category
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'video' => 'required',
            'song' => 'required',
            'band_id' => 'required',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $song->title = htmlspecialchars($request->title);
        $song->song = $request->song;
        $song->video = htmlspecialchars($request->video);
        $song->band_id = htmlspecialchars($request->band_id);

        $song->update();

        return redirect(route('song.index'))->withToastSuccess('Song Updated Successfully!');
    }

    public function destroy(Song $song)
    {
        //delete Song
        $song->delete();

        return redirect(route('song.index'))->withToastSuccess('Song Deleted Successfully!');
    }
}
