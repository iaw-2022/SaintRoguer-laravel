<?php

namespace App\Http\Controllers;

use App\Models\Art;
use Illuminate\Http\Request;
use App\Models\Critic;
use Illuminate\Support\Str;

class CriticController extends Controller
{
    public function create()
    {
        $art_id = Str::after(url()->full(), '=');
        $art = Art::find($art_id);

        return view('critics.create', compact('art'));
    }

    public function store(Request $request, Art $art)
    {

        $critic = Critic::create([
            'from' => $request->from,
            'art_id' => $request->art_id,
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        return redirect()->route('arts.show', $critic->art_id);
    }

    public function edit(int $critic)
    {
        $critic = Critic::find($critic);
        return view('critics.edit', compact('critic'));
    }

    public function update(Request $request, Critic $critic)
    {
        $critic->update(request()->all());
        return redirect()->route('arts.show', $critic->art_id);
    }

    public function destroy(Critic $critic)
    {
        $critic->delete();

        return redirect()->route('arts.show', $critic->art_id);
    }
}
