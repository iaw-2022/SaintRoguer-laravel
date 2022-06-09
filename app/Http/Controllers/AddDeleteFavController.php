<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Art;
use App\Models\User;

class AddDeleteFavController extends Controller
{
    public function store(Art $art)
    {
        dd($art);
        $user = User::find(auth()->user()->id);

        $user->favorites()->attach($art);

        return redirect()->route('arts.show', $art->id);
    }

    public function destroy(Request request, Art $art, $id)
    {
        dd($id);

        $user = User::find(auth()->user()->id);

        $user->favorites()->detach($id);

        $arts = auth()->user()->favorites;
        return redirect()->route('favorites.index', compact('arts'))->with('success', 'Favorite eliminated successfully');;
    }
}
