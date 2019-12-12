<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ChordsController extends Controller
{
    public function index()
    {
        //get first 7 Categories
        $categories = Category::whereBetween('id', array(1,7))->get();

        $chords = Chord::latest()->get();
        return view('chords.index', compact('chords', 'categories'));
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        //validate save chord
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'pics' => 'required|image|mimes:jpeg,png,jpg,svg|max:1024',
            'category_id' => 'required',
        ]);
        //display error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $chord = new Chord();

        // Upload img
        if($request->hasFile('pics')){
            // Filename with extension
            $filename = $request->file('pics')->getClientOriginalName();
            // Path to save file in bands folder
            $request->file('pics')->storeAs('public/chords/', $filename);
        } else {
            $filename = 'default.svg';
        }

        $chord->name = htmlspecialchars($request->name);
        $chord->category_id = htmlspecialchars($request->category_id);
        $chord->pics = $filename;

        $chord->save();

        return redirect(route('chord.index'))->withToastSuccess('Chord Created Successfully!');
    }

    public function show(Chord $chord)
    {
        //get first 7 Categories
        $categories = Category::whereBetween('id', array(1,7))->get();
        return view('chords.show', compact('chord', 'categories'));
    }

    public function edit()
    {
        return back();
    }

    public function update(Request $request, Chord $chord)
    {
        //validate update category
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',

            'pics' => 'sometimes|image|mimes:jpeg,png,jpg,svg|max:1024',
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
            $request->file('pics')->storeAs('public/chords/', $filename);
        }

        $chord->name = htmlspecialchars($request->name);
        $chord->category_id = htmlspecialchars($request->category_id);
        if($request->hasFile('pics')){
            // Delete Old Image
            Storage::delete('public/chords/'.$chord->pics);
            $chord->pics = $filename;
        }

        $chord->update();

        return redirect(route('chord.index'))->withToastSuccess('Chord Updated Successfully!');
    }

    public function destroy(Chord $chord)
    {
        //delete chord
        $chord->delete();
        //Delete Image
        Storage::delete('/public/chords/'.$chord->pics);

        return redirect(route('chord.index'))->withToastSuccess('Chord Deleted Successfully!');
    }
}
