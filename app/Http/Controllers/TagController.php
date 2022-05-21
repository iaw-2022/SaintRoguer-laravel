<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;
use App\Models\Art;


class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $tags = $tags->sortBy('name');
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags|max:255',
        ]);
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);

        $tag->save();
        return redirect()->route('tags.index');
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|unique:tags|max:255',
        ]);
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->save();
        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index');
    }

    public function manage(Art $art)
    {
        $tags = $art->tags;        
        $tags = $tags->sortBy('id');
        return view('tags.manage', compact('art', 'tags'));
    }

    public function add(Art $art)
    {
        $unownedTags = Tag::whereDoesntHave('arts', function ($query) use ($art) {
            $query->where('arts.id', $art->id);
        })->get()->pluck('name','id');
        return view('tags.add', compact('art', 'unownedTags'));
    }

    public function addStore(Art $art, Request $request)
    {
        $art->tags()->attach($request->tag);
        return redirect()->route('tags.manage', $art);
    }

    public function remove(Art $art, Request $request)
    {
        $art->tags()->detach($request->tag_id);
        return redirect()->route('tags.manage', compact('art'));
    }
}
