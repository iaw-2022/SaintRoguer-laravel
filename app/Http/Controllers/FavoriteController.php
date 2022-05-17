<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Art;
use Illuminate\Validation\Rule;

class FavoriteController extends Controller
{

    public function index()
    {
        $arts = User::find(auth()->user()->id)->favorites;
        $arts = $arts->sortBy('id');
        return view('favorites.index', compact('arts'));
    }

    public function store(Request $request, Art $art)
    {
        $art1 = Str::after(url()->full(), '?');
        $art2 = Str::before($art1, '=');
        $user = User::find(auth()->user()->id);

        $atached = $user->favorites()->where('art_id', $art2)->first();

        if($atached == null)
            $user->favorites()->attach([
                $art2 => ['state' => 'to-watch', 'rating' => '0'],
            ]);

        return redirect()->route('favorites.index');
    }

    public function edit()
    {
        $favorite_id1 = Str::after(url()->full(), '?');
        $favorite_id2 = Str::before($favorite_id1, '=');
        $favorite = db::table('art_user')->where('id', $favorite_id2)->first();
        $state = [
            'to-watch' => 'to-watch',
            'watched' => 'watched',

        ];

        return view('favorites.edit', compact('favorite', 'state'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'state' => 'required|',Rule::in(['to-watch', 'watched']),
            'rating' => 'nullable|integer|max:100',
        ]);
        $user = User::find(auth()->user()->id);
        db::table('art_user')->where('id', $id)->update(['state' => $request->state, 'rating' => $request->rating]);

        return redirect()->route('favorites.index')->with('success', 'Favorite updated successfully');
    }

    public function destroy()
    {

        $favorite_id1 = Str::after(url()->full(), 'favorites/');
        $favorite_id2 = Str::before($favorite_id1, '/Delete');

        $user = User::find(auth()->user()->id);
        db::table('art_user')->where('id', $favorite_id2)->delete();

        $arts = auth()->user()->favorites;
        return redirect()->route('favorites.index', compact('arts'))->with('success', 'Favorite eliminated successfully');;
    }
}
