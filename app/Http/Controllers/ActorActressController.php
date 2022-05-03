<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActorActress;
use App\Models\Art;
use Illuminate\Support\Facades\DB;


class ActorActressController extends Controller
{
    public function index()
    {
        $actors_actresses = ActorActress::paginate(9);
        return view('actors-actresses.index', compact('actors_actresses'));
    }

    public function create()
    {
        return view('actors-actresses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $actor_actress = ActorActress::create($request->all());
        if ($request->file('file')) {


            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
            $image_content = base64_encode(file_get_contents(($request->file('file')->path())));

            $actor_actress->image()->create([
                'image_content' => $image_content,
                'extension' => 'data:image/' . $file_extension . ';base64,'
            ]);
        }
        return redirect()->route('actors-actresses.index')->with('success', 'Actor/Actress added successfully');
    }

    public function edit(ActorActress $actor_actress)
    {
        return view('actors-actresses.edit', compact('actor_actress'));
    }
    //Ver edit
    public function update(Request $request, ActorActress $actor_actress)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $actor_actress->update($request->all());
        if ($request->file('file')) {

            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
            $image_content = base64_encode(file_get_contents(($request->file('file')->path())));
            if ($actor_actress->image) {

                $actor_actress->image->image_content = $image_content;
                $actor_actress->image->extension = 'data:image/' . $file_extension . ';base64,';
                $actor_actress->image->save();
            } else
                $actor_actress->image()->create([
                    'image_content' => $image_content,
                    'extension' => 'data:image/' . $file_extension . ';base64,'
                ]);
        }
        return redirect()->route('actors-actresses.edit', compact('actor_actress'))->with('info', 'Actor/Actress updated successfully');
    }
    public function destroy(ActorActress $actor_actress)
    {
        $actor_actress->delete();
        return redirect()->route('actors-actresses.index')->with('danger', 'Actor/Actress deleted successfully');
    }

    public function addToArt(ActorActress $actor_actress)
    {
        $arts = Art::paginate(9);

        return view('actors-actresses.addToArt', compact('actor_actress', 'arts'));
    }

    public function addToArtStore(Request $request, ActorActress $actor_actress, Art $art)
    {
        $art1 = Art::find($request->art_id);
        $art1->actor_actresses()->attach([
            $actor_actress->id => ['role' => $request->role]
        ]);

        $actors_actresses = ActorActress::paginate(9);

        return redirect()->route('actors-actresses.index', compact('actors_actresses'))->with('success', 'Actor/Actress added to art successfully');
    }

    public function removeFromArt(ActorActress $actor_actress)
    {

        $arts = DB::table('actor_actress_art')->where('actor_actress_id', $actor_actress->id)
            ->join('arts', 'arts.id', '=', 'actor_actress_art.art_id')
            ->paginate(9);

        return view('actors-actresses.removeFromArt', compact('actor_actress', 'arts'));
    }

    public function removeFromArtDestroy(Request $request, ActorActress $actor_actress, Art $art)
    {
        $art = Art::find($request->art_id);
        $art->actor_actresses()->detach($request->id);

        $actors_actresses = ActorActress::paginate(9);

        return redirect()->route('actors-actresses.index', compact('actors_actresses'))->with('success', 'Actor/Actress remove from art successfully');
    }
}
