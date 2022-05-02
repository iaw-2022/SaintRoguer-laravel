<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Art;
use Illuminate\Support\Facades\DB;


class ArtController extends Controller
{
    public function index()
    {
        $arts = Art::paginate(9);

        return view('arts.index', compact('arts'));
    }

    public function show(Art $art)
    {
        //$actors_actresses = $art->actor_actresses;
        $critics = $art->critics;
        $actors_actresses = DB::table('actor_actress_art')->where('art_id', $art->id)
            ->join('actor_actresses', 'actor_actresses.id', '=', 'actor_actress_art.actor_actress_id')
            ->get();
        //dd($roles);

        return view('arts.show', compact('art', 'actors_actresses', 'critics'));
    }
}
