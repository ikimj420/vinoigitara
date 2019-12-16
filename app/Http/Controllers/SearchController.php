<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;
use App\Models\Chord;
use App\Models\Song;

class SearchController extends Controller
{
    public function welcome(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $songs = Song::with('band')->where('title','LIKE','%'.$request->search."%")->get();
            $bands = Band::where('name','LIKE','%'.$request->search."%")->get();
            $chords = Chord::where('name','LIKE','%'.$request->search."%")->get();

            if($songs)
            {
                foreach ($songs as $key => $song) {
                    $output.='<div class="container"><div class="row"><div class="mt-4 col-lg-12"><a href="/show/'.$song->id.'">'.$song->title.' &nbsp;&nbsp;&nbsp; '.$song->band["name"].'</a></div></div></div>';
                }

                foreach ($bands as $key => $band) {
                    $output.='<div class="container"><div class="row"><div class="mt-4 col-lg-12"><br><a href="/artist/'.$band->id.'">'.$band->name.'</a></div></div></div>';
                }

                foreach ($chords as $key => $chord) {
                    $output.='<div class="container"><div class="row"><div class="mt-4 col-lg-12"><a href="/pictures/'.$chord->id.'">'.$chord->name.'</a></div></div></div>';
                }

                if(!empty($output))
                    return Response($output);
                else
                    return 'No Song Artist-Band Chord Found';
            }
        }
    }

    public function song(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $songs = Song::with('band')->where('title','LIKE','%'.$request->search."%")->get();
            if($songs)
            {
                foreach ($songs as $key => $song) {
                    $output.='<div class="container"><div class="row"><div class="mt-4 col-lg-12"><a href="/song/'.$song->id.'">'.$song->title.' &nbsp;&nbsp;&nbsp; '.$song->band["name"].'</a></div></div></div>';
                }
                if(!empty($output))
                    return Response($output);
                else
                    return 'No Song Found';
            }
        }
    }

    public function chord(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $chords = Chord::where('name','LIKE','%'.$request->search."%")->get();
            if($chords)
            {
                foreach ($chords as $key => $chord) {
                    $output.='<div class="container"><div class="row"><div class="mt-4 col-lg-12"><a href="/chord/'.$chord->id.'">'.$chord->name.'</a></div></div></div>';
                }
                if(!empty($output))
                    return Response($output);
                else
                    return 'No Chord Found';
            }
        }
    }

    public function band(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $bands = Band::where('name','LIKE','%'.$request->search."%")->get();
            if($bands)
            {
                foreach ($bands as $key => $band) {
                    $output.='<div class="container"><div class="row"><div class="mt-4 col-lg-12"><br><a href="/band-artist/'.$band->id.'">'.$band->name.'</a></div></div></div>';
                }
                if(!empty($output))
                    return Response($output);
                else
                    return 'No Band-Artist Found';
            }
        }
    }
}
