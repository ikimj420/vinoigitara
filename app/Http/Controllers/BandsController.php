<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Category;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BandsController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $bands = Band::latest()->get();

        return view('bands.index', compact('bands', 'categories'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        //validate save band
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'desc' => 'required',
            'pics' => 'required|image|mimes:jpeg,png,jpg,svg|max:1024',
            'category_id' => 'required',

            'year_start' => 'sometimes',
            'year_end' => 'sometimes',
            'albums' => 'sometimes'
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $band = new Band();

        // Upload img
        if($request->hasFile('pics')){
            // Filename with extension
            $filename = $request->file('pics')->getClientOriginalName();
            // Path to save file in bands folder
            $request->file('pics')->storeAs('public/bands/', $filename);
        } else {
            $filename = 'default.svg';
        }

        $band->name = htmlspecialchars($request->name);
        $band->desc = $request->desc;
        $band->year_start = htmlspecialchars($request->year_start);
        $band->year_end = htmlspecialchars($request->year_end);
        $band->albums = $request->albums;
        $band->category_id = htmlspecialchars($request->category_id);
        $band->pics = $filename;

        $band->save();

        return redirect(route('band-artist.index'))->withToastSuccess('Band Created Successfully!');
    }

    public function show(Band $band_artist)
    {
        //category
        $categories = Category::latest()->get();
        $songs = Song::with('band')->where('band_id', '=', $band_artist->id)->get();
        return view('bands.show', compact('band_artist', 'categories', 'songs'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, Band $band_artist)
    {
        //validate update category
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'desc' => 'required',
            'category_id' => 'required',

            'pics' => 'sometimes|image|mimes:jpeg,png,jpg,svg|max:1024',
            'year_start' => 'sometimes',
            'year_end' => 'sometimes',
            'albums' => 'sometimes'
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Upload img
        if($request->hasFile('pics')){
            // Filename with extension
            $filename = $request->file('pics')->getClientOriginalName();
            // Path to save file in images folder
            $request->file('pics')->storeAs('public/bands/', $filename);
        }

        $band_artist->name = htmlspecialchars($request->name);
        $band_artist->desc = $request->desc;
        $band_artist->year_start = htmlspecialchars($request->year_start);
        $band_artist->year_end = htmlspecialchars($request->year_end);
        $band_artist->albums = $request->albums;
        $band_artist->category_id = htmlspecialchars($request->category_id);
        if($request->hasFile('pics')){
            // Delete Old Image
            Storage::delete('public/bands/'.$band_artist->pics);
            $band_artist->pics = $filename;
        }

        $band_artist->update();

        return redirect(route('band-artist.index'))->withToastSuccess('Band Updated Successfully!');
    }

    public function destroy(Band $band_artist)
    {
        //delete band
        $band_artist->delete();
        //Delete Image
        Storage::delete('/public/bands/'.$band_artist->pics);

        return redirect(route('band-artist.index'))->withToastSuccess('Band Deleted Successfully!');
    }
}
